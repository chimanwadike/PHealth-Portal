<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Events\UserCreated;

class UserController extends Controller
{
	public function index()
    {
        $users = User::paginate(10);

        return view('pages.users.list', compact("users"));
    }

    public function create()
    {
        $roles = Role::all();

        return view('pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'employee_id' => 'required|unique:admin_users,employee_id',
            'phone' => 'required|phone:AUTO,NG',
            'address' => 'required',
            'role' => 'required',
            'sex' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Please provide the staff\'s name.',
            'email.required' => 'Please provide the staff\'s email.',
            'email.unique' => 'A staff with thesame email already exist.',
            'email.email' => 'Please provide a valid staff email.',
            'phone.required' => 'Please provide the staff\'s phone number.',
            'phone.phone' => 'Please provide a valid phone number.',
            'address.required' => 'Please provide the staff\'s address.',
            'role.required' => "Please select staff's role",
            'employee_id.required' => 'Please provide the staff\'s ID.',
            'employee_id.unique' => 'A staff with thesame ID already exist.',
            'sex.required' => "Please select staff's gender",
        ];

        $this->validate($request, $rules, $customMessages);

        $password = rand(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'created_by' => auth()->user()->owner->id,
            'employee_id'=> $request->employee_id,
            'sex'=> $request->sex,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($password),
            'typeable_id' => $admin_user->id,
			'typeable_type' => get_class($admin_user),
            'email_verified_at' => now(),
        ]);

        //Assign role to the user
        $user->assignRole($request->role);

        //Throw the admin created event
        event(new UserCreated($user, $password));

        notify()->success('Successfully created!');

        return redirect()->route("users.index");
    }

    public function show(User $user)
    {
        $roles = Role::all();

        return view('pages.users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],

            'employee_id' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],

            'name' => 'required',
            'phone' => 'required|phone:AUTO,NG',
            'address' => 'required',
            'role' => 'required',
            'sex' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Please provide the staff\'s name.',
            'email.required' => 'Please provide the staff\'s email.',
            'email.unique' => 'A staff with thesame email already exist.',
            'email.email' => 'Please provide a valid staff email.',
            'phone.required' => 'Please provide the staff\'s phone number.',
            'phone.phone' => 'Please provide a valid phone number.',
            'address.required' => 'Please provide the staff\'s address.',
            'role.required' => "Please select staff's role",
            'employee_id.required' => 'Please provide the staff\'s ID.',
            'employee_id.unique' => 'A staff with thesame ID already exist.',
            'sex.required' => "Please select staff's gender",
        ];

        $this->validate($request, $rules, $customMessages);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone,
            'employee_id'=> $request->employee_id,
            'sex'=> $request->sex,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $user->syncRoles($request->role);

        notify()->success("Successfully updated!");

        return redirect()->route("user.index");
    }

    public function destroy(User $user)
    {
        $user->delete();

        notify()->success("Successfully Deleted!");

        return redirect()->route('users.index');
    }

	public function my_profile()
    {
        $user = auth()->user();

        return view('pages.profile.my_profile', compact('user'));
    }

    public function others_profile(User $user)
    {
        if($user == auth()->user()){
            return redirect()->route('my_profile');
        }else{
            return view('pages.profile.others_profile', compact('user'));
        }
    }

    public function change_photo(Request $request, User $user)
    {
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
    }

    public function edit()
    {
        return view('pages.profile.edit_profile');
    }

    public function update_self_profile(Request $request)
    {
        $rules = [
            'employee_id' => [
                'required',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],

            'name' => 'required',
            'phone' => 'required|phone:AUTO,NG',
            'address' => 'required',
            'sex' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Please provide the staff\'s name.',
            'phone.required' => 'Please provide the staff\'s phone number.',
            'phone.phone' => 'Please provide a valid phone number.',
            'address.required' => 'Please provide the staff\'s address.',
            'employee_id.required' => 'Please provide the staff\'s ID.',
            'employee_id.unique' => 'A staff with thesame ID already exist.',
            'sex.required' => "Please select staff's gender",
        ];

        $this->validate($request, $rules, $customMessages);

        auth()->user()->update([
            'name' => $request->name,
            'phone'=> $request->phone,
            'employee_id'=> $request->employee_id,
            'sex'=> $request->sex,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        notify()->success("Successfully updated!");

        return redirect()->route("my_profile");
    }
}
