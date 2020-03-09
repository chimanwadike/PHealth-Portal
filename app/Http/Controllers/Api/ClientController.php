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
	            'user_id' => $user->id,
				'facility_id' => $user->facility->id,
				'client_state_code' => $request->client_state_code,
				'client_lga_code' => $request->client_lga_code,
				'referral_state' => $request->referral_state,
				'referral_lga' => $request->referral_lga,
				'reffered_to' => $request->reffered_to,
				'firstname' => $request->firstname,
				'surname' => $request->surname,
				'age' => $request->age,
				'date_of_birth' => $request->date_of_birth,
				'estimated' => $request->estimated,
				'sex' => $request->sex,
				'address' => $request->address,
				'phone_number' => $request->phone_number,
				'form_date' => $request->form_date,
				'current_result' => $request->current_result,
				'hiv_test_date' => $request->hiv_test_date,
				'comment' => $request->comment,
				'previously_tested' => $request->previously_tested,
				'previous_result' => $request->previous_result,
				'date_of_test' => $request->date_of_test,
				'testing_point' => $request->testing_point,
				'client_reported' => $request->client_reported,
				'date_client_reported' => $request->date_client_reported,
				'session_type' => $request->session_type,
				'is_index_client' => $request->is_index_client,
				'index_client_id' => $request->index_client_id,
				'index_type' => $request->index_type,
				'referral_date' => $request->referral_date,
				'client_identifier' => $request->client_identifier,
				'client_village' => $request->client_village,
				'client_geo_code' => $request->client_geo_code,
				'marital_status' => $request->marital_status,
				'employment_status' => $request->employment_status,
				'religion' => $request->religion,
				'education_level' => $request->education_level,
				'hiv_recency_test_type' => $request->hiv_recency_test_type,
				'hiv_recency_test_date' => $request->hiv_recency_test_date,
				'final_recency_test_result' => $request->final_recency_test_result,
				'risk_age_group' => $request->risk_age_group,
				'risk_test_date' => $request->risk_test_date,
				'risk_stratification' => $request->risk_stratification,
				'risk_test_result' => $request->risk_test_result,
				'traced' => $request->traced,
				'stopped_at_pre_test' => $request->stopped_at_pre_test,
				'client_confirmed' => $request->client_confirmed,
				'date_client_confirmed' => $request->date_client_confirmed,
				'app_version_number' => $request->app_version_number,
				'pre_test_counsel' => $request->pre_test_counsel,
				'post_test_councel' => $request->post_test_councel,
				'post_tested_before_within_this_year' => $request->post_tested_before_within_this_year,
				'pretest_json' => $request->pretest_json,
				'facility_client_reported' => $request->facility_client_reported,
				'eligibility_level' => $request->eligibility_level,
				'delete_flag' => $request->delete_flag,
	        ]);

	        return response()->json("".$client->id, 200);
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
    		$client_ids = array();

			foreach($request->clients as $client){
				$client_info = Client::create([
		            'user_id' => $user->id,
					'facility_id' => $user->facility->id,
					'client_state_code' => $client['client_state_code'],
					'client_lga_code' => $client['client_lga_code'],
					'referral_state' => $client['referral_state'],
					'referral_lga' => $client['referral_lga'],
					'reffered_to' => $client['reffered_to'],
					'firstname' => $client['firstname'],
					'surname' => $client['surname'],
					'age' => $client['age'],
					'date_of_birth' => $client['date_of_birth'],
					'estimated' => $client['estimated'],
					'sex' => $client['sex'],
					'address' => $client['address'],
					'phone_number' => $client['phone_number'],
					'form_date' => $client['form_date'],
					'current_result' => $client['current_result'],
					'hiv_test_date' => $client['hiv_test_date'],
					'comment' => $client['comment'],
					'previously_tested' => $client['previously_tested'],
					'previous_result' => $client['previous_result'],
					'date_of_test' => $client['date_of_test'],
					'testing_point' => $client['testing_point'],
					'client_reported' => $client['client_reported'],
					'date_client_reported' => $client['date_client_reported'],
					'session_type' => $client['session_type'],
					'is_index_client' => $client['is_index_client'],
					'index_client_id' => $client['index_client_id'],
					'index_type' => $client['index_type'],
					'referral_date' => $client['referral_date'],
					'client_identifier' => $client['client_identifier'],
					'client_village' => $client['client_village'],
					'client_geo_code' => $client['client_geo_code'],
					'marital_status' => $client['marital_status'],
					'employment_status' => $client['employment_status'],
					'religion' => $client['religion'],
					'education_level' => $client['education_level'],
					'hiv_recency_test_type' => $client['hiv_recency_test_type'],
					'hiv_recency_test_date' => $client['hiv_recency_test_date'],
					'final_recency_test_result' => $client['final_recency_test_result'],
					'risk_age_group' => $client['risk_age_group'],
					'risk_test_date' => $client['risk_test_date'],
					'risk_stratification' => $client['risk_stratification'],
					'risk_test_result' => $client['risk_test_result'],
					'traced' => $client['traced'],
					'stopped_at_pre_test' => $client['stopped_at_pre_test'],
					'client_confirmed' => $client['client_confirmed'],
					'date_client_confirmed' => $client['date_client_confirmed'],
					'app_version_number' => $client['app_version_number'],
					'pre_test_counsel' => $client['pre_test_counsel'],
					'post_test_councel' => $client['post_test_councel'],
					'post_tested_before_within_this_year' => $client['post_tested_before_within_this_year'],
					'pretest_json' => $client['pretest_json'],
					'facility_client_reported' => $client['facility_client_reported'],
					'eligibility_level' => $client['eligibility_level'],
					'delete_flag' => $client['delete_flag'],
		        ]);

				$client_ids[] = $client_info->id;
			}

			return response()->json(implode($client_ids, ","), 200);
		}else{
        	return response()->json([
	            'code' => '02',
	            'message' => 'User could not be found or user does not have the facility role'
	        ], 401);
        }
	}
}