<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\User;

class ClientController extends Controller
{
	public function client_store(Request $request)
    {
		$rules = [
			'user_id' => 'required',
			'client_state_code' => 'required',
			'client_lga_code' => 'required',
			'referral_state' => 'required',
			'referral_lga' => 'required',
			'reffered_to' => 'required',
        ];

        $this->validate($request, $rules, []);

        $user = User::find($request->user_id);

        if($user && $user->roles()->first()->name == "facility"){
        	$client = Client::create([
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

	        return response()->json([
	            'code' => '01',
	            'client_id' => $client->id,
	            'message' => 'Successful'
	        ], 200);
        }else{
        	return response()->json([
	            'code' => '02',
	            'message' => 'User could not be found or user does not have the facility role'
	        ], 401);
        }
	}

	public function client_store_bulk(Request $request)
    {
    	$user = User::find($request->user_id);

    	if($user && $user->roles()->first()->name == "facility"){
			foreach($request->clients as $client){
				$client_ids = array();

				$client = Client::create([
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

				$client_ids[] = $client->id;
			}

			return response()->json([
	            'code' => '01',
	            'client_ids' => $client_ids,
	            'message' => 'Successful'
	        ], 200);
		}else{
        	return response()->json([
	            'code' => '02',
	            'message' => 'User could not be found or user does not have the facility role'
	        ], 401);
        }
	}
}
