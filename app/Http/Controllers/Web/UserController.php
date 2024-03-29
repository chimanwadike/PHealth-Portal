<?php

namespace App\Http\Controllers\Web;

use App\Model\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Events\UserCreated;
use App\Model\Facility;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
	public function index()
    {
        if(auth()->user()->hasRole('admin')){
            $users = User::paginate(10);

            return view('pages.users.list', compact("users"));
        }elseif(auth()->user()->hasRole('coordinator')){
            $users = User::whereRoleIs('facility')->paginate(10);

            return view('pages.users.list', compact("users"));
        }else{
            abort(403);
        }
    }

    public function create()
    {
        if(auth()->user()->hasRole('admin')){
            $roles = Role::all();
            $facilities = Facility::all();
            $states = State::all();

            return view('pages.users.create', compact('roles', 'facilities', 'states'));
        }else{
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if(auth()->user()->hasRole('admin')){
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|phone:AUTO,NG',
                'address' => 'required',
                'role' => 'required',
                'sex' => 'required'
            ];

            $customMessages = [
                'name.required' => 'Please provide the user\'s name.',
                'email.required' => 'Please provide the user\'s email.',
                'email.unique' => 'A user with thesame email already exist.',
                'email.email' => 'Please provide a valid user email.',
                'phone.required' => 'Please provide the user\'s phone number.',
                'phone.phone' => 'Please provide a valid phone number.',
                'address.required' => 'Please provide the user\'s address.',
                'role.required' => "Please select user's role",
                'sex.required' => "Please select user's gender",
            ];

            if($request->role == "3"){
                $rules['facility'] = "required";
                $customMessages['facility.required'] = "Please select the user's facility";
            }

            $this->validate($request, $rules, $customMessages);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'created_by' => auth()->user()->id,
                'employee_id'=> $request->employee_id,
                'sex'=> $request->sex,
                'address' => $request->address,
                'phone' => $request->phone,
                'facility_id' => $request->facility,
                'password' => bcrypt($request->phone),
                'spoke_id' => $request->spoke
            ]);

            //Assign role to the user
            $user->syncRoles([$request->role]);

            //Throw the admin created event
//            event(new UserCreated($user, $password));

            notify()->success('Successfully created!');

            return redirect()->route("users.index");
        }else{
            abort(403);
        }
    }

    public function show(User $user)
    {
        if(auth()->user()->hasRole(['admin','coordinator'])){
            $roles = Role::all();
            $facilities = Facility::all();
            $states = State::all();

            return view('pages.users.edit_admin', compact('roles', 'user', 'facilities', 'states'));
        }else{
            abort(403);
        }
    }

    public function update(Request $request, User $user)
    {
        if(auth()->user()->hasRole('admin')){
            $rules = [
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id),
                ],

                'name' => 'required',
                'phone' => 'required|phone:AUTO,NG',
                'address' => 'required',
                'role' => 'required',
                'sex' => 'required'
            ];

            $customMessages = [
                'name.required' => 'Please provide the user\'s name.',
                'email.required' => 'Please provide the user\'s email.',
                'email.unique' => 'A user with thesame email already exist.',
                'email.email' => 'Please provide a valid user email.',
                'phone.required' => 'Please provide the user\'s phone number.',
                'phone.phone' => 'Please provide a valid phone number.',
                'address.required' => 'Please provide the user\'s address.',
                'role.required' => "Please select user's role",
                'sex.required' => "Please select user's gender",
            ];

            if($request->role == "3"){
                $rules['facility'] = "required";
                $customMessages['facility.required'] = "Please select the user's facility";
            }

            $this->validate($request, $rules, $customMessages);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone'=> $request->phone,
                'employee_id'=> $request->employee_id,
                'sex'=> $request->sex,
                'address' => $request->address,
                'phone' => $request->phone,
                'facility_id' => $request->facility,
                'spoke_id' => $request->spoke
            ]);

            $user->syncRoles([$request->role]);

            notify()->success("Successfully updated!");

            return redirect()->route("users.index");
        }elseif(auth()->user()->hasRole('coordinator')){
            $rules = [
                'facility' => 'required',
            ];

            $customMessages = [
                'facility.required' => 'Please select the user\'s facility',
            ];

            $this->validate($request, $rules, $customMessages);

            $user->update([
                'facility_id' => $request->facility,
            ]);

            notify()->success("Successfully updated!");

            return redirect()->route("users.index");
        }else{
            abort(403);
        }
    }

    public function destroy(User $user)
    {
        if(auth()->user()->hasRole('admin')){
            $user->delete();

            notify()->success("Successfully Deleted!");

            return redirect()->route('users.index');
        }else{
            abort(403);
        }
    }

	public function my_profile()
    {
        $user = auth()->user();

        return view('pages.users.profile', compact('user'));
    }

    public function others_profile(User $user)
    {
        if($user == auth()->user()){
            return redirect()->route('my_profile');
        }else{
            if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')){
                return view('pages.users.profile', compact('user'));
            }else{
                abort(403);
            }
        }
    }

    public function change_photo(Request $request, User $user)
    {
        if(auth()->user()->hasRole('admin')){
            $request->validate([
                "image" => "required|mimes:jpeg,png"
            ]);

            if ($user->profile_image !== 'avatars/default.png') {
                Storage::disk('public')->delete($user->profile_image);
            }

            $path = $request->file('image')->store("User-".auth()->user()->id, 'public');

            $user->profile_image = $path;

            $user->save();

            notify()->success("Profile photo was updated successfully!");

            return response()->json([
                'message' => 'Updated successfully!'
            ], 200);
        }else{
            abort(403);
        }
    }
}
