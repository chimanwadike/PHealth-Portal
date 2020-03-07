<?php

namespace App\Http\Controllers\Web;

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
        // SHA512(merchantId+serviceTypeId+orderId+totalAmount+apiKey)
        // dd(hash('sha512', '2547164430731221028200001946'));
        $users = User::paginate(10);

        return view('pages.users.list', compact("users"));
    }

    public function create()
    {
        $roles = Role::all();
        $facilities = Facility::all();

        return view('pages.users.create', compact('roles', 'facilities'));
    }

    public function store(Request $request)
    {
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

        $password = rand(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'created_by' => auth()->user()->id,
            'employee_id'=> $request->employee_id,
            'sex'=> $request->sex,
            'address' => $request->address,
            'phone' => $request->phone,
            'facility_id' => $request->facility,
            'password' => Hash::make($password),
        ]);

        //Assign role to the user
        $user->syncRoles([$request->role]);

        //Throw the admin created event
        event(new UserCreated($user, $password));

        notify()->success('Successfully created!');

        return redirect()->route("users.index");
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $facilities = Facility::all();

        return view('pages.users.edit', compact('roles', 'user', 'facilities'));
    }

    public function update(Request $request, User $user)
    {
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
        ]);

        $user->syncRoles([$request->role]);

        notify()->success("Successfully updated!");

        return redirect()->route("users.index");
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

        return view('pages.users.profile', compact('user'));
    }

    public function others_profile(User $user)
    {
        if($user == auth()->user()){
            return redirect()->route('my_profile');
        }else{
            return view('pages.users.profile', compact('user'));
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
        return view('pages.users.profile.edit_my_profile');
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
