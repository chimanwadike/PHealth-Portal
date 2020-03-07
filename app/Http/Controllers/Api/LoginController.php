<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if($request->username == "" || $request->password == ""){
        	return response()->json([
        		'code' => '00',
        		'message' => 'Please provide your username and password'
        	], 419);
        }else{
            $userdata = array(
                'email'     => $request->username,
                'password'  => $request->password,
            );

        	if(Auth::attempt($userdata)){
                return response()->json([
                    'code' => '01',
                    'data' => User::where('email', $request->username)->get()->first(),
                    'message' => 'Login Successful'
                ], 200);
        	}else{
        		return response()->json([
                    'code' => '02',
                    'message' => 'Invalid login details, please try again'
                ], 401);
        	}
        }
    }
}
