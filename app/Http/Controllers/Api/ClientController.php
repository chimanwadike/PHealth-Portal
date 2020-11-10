<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClientResource;
use App\Model\Facility;
use App\Model\FingerPrint;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\User;
use Monolog\Handler\IFTTTHandler;

class ClientController extends Controller
{
	public function client_store(Request $request)
    {
		$rules = [
			'user_id' => 'required',
			'client_state_code' => 'required',
			'client_lga_code' => 'required',
        ];

        $this->validate($request, $rules, []);

        $user = User::find($request->user_id);

        if($user && $user->roles()->first()->name == "facility"){
            $exists = Client::where('client_identifier', $request->client_identifier)->get();
            if ($exists == null){
                $client = Client::create([
                    'user_id' => $user->id,
                    'facility_id' => $user->facility->id,
                    'client_state_code' => $request->client_state_code,
                    'client_lga_code' => $request->client_lga_code,
                    'referral_state_code' => $request->referral_state,
                    'referral_lga_code' => $request->referral_lga,
                    'reffered_to' => $request->reffered_to != null ? ($request->reffered_to == 0 ? null : $request->reffered_to) : null,
                    'firstname' => $request->firstname,
                    'surname' => $request->surname,
                    'age' => $request->age,
//				'date_of_birth' => Carbon::createFromFormat("d/m/Y", $request->date_of_birth),
                    'estimated' => $request->estimated != null ?  Carbon::createFromFormat("d/m/Y", $request->estimated) : null,
                    'sex' => $request->sex,
                    'address' => $request->address,
                    'address_2' => $request->address_2,
                    'address_3' => $request->address_3,
                    'care_giver_name' => $request->care_giver_name,
                    'phone_number' => $request->phone_number,
                    'form_date' => $request->hiv_test_date != null ? Carbon::createFromFormat("d/m/Y", $request->form_date) : null,
                    'current_result' => $request->current_result,
                    'hiv_test_date' => $request->hiv_test_date != null ? Carbon::createFromFormat("d/m/Y",$request->hiv_test_date) : null,
                    'comment' => $request->comment,
                    'previously_tested' => $request->previously_tested,
                    'previous_result' => $request->previous_result,
                    'date_of_test' => $request->date_of_test != null ? Carbon::createFromFormat("d/m/Y", $request->date_of_test) : null,
                    'testing_point' => $request->testing_point,
                    'client_reported' => $request->client_reported,
//				'date_client_reported' => Carbon::createFromFormat("d/m/Y", $request->date_client_reported),
                    'session_type' => $request->session_type,
                    'is_index_client' => $request->is_index_client,
                    'index_client_id' => $request->index_client_id,
                    'index_type' => $request->index_type,
                    'referral_date' =>  $request->referral_date != null ? Carbon::createFromFormat("d/m/Y",$request->referral_date ) : null,
                    'client_identifier' => $request->client_identifier,
                    'client_village' => $request->client_village,
                    'client_geo_code' => $request->client_geo_code,
                    'marital_status' => $request->marital_status,
                    'employment_status' => $request->employment_status,
                    'religion' => $request->religion,
                    'education_level' => $request->education_level,
                    'hiv_recency_test_type' => $request->hiv_recency_test_type,
                    'hiv_recency_test_date' => $request->hiv_recency_test_date != null ? Carbon::createFromFormat("d/m/Y",$request->hiv_recency_test_date) : null,
                    'final_recency_test_result' => $request->final_recency_test_result,
                    'risk_age_group' => $request->risk_age_group,
                    'risk_test_date' => $request->risk_test_date != null ?  Carbon::createFromFormat("d/m/Y",$request->risk_test_date) : null,
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
                    'services' => $request->services,
                    'spoke_id' => $request->spoke_id
                ]);

                return response()->json("".$request->form_id.":".$client->id, 200);
            }
        }else{
        	return response()->json([
	            'code' => '02',
	            'message' => 'User could not be found or user does not have the facility role'
	        ], 401);
        }
	}

	public function client_store_bulk(Request $request)
    {
    	//$user = User::find($request->user_id);
        $user = null;

        foreach($request->all() as $req) {
          $user = User::find($req["user_id"]);
            // break loop after first iteration
            break;
        }


        if ($user != null){
            if($user && $user->roles()->first()->name == "facility"){
                $client_ids = array();

                foreach($request->all() as $client){

                    //test output
                    //dd($client['finger_print']);

                    $client_info = Client::create([
                        'user_id' => $user->id,
                        'facility_id' => $user->facility->id,
                        'client_state_code' => $client['client_state_code'],
                        'client_lga_code' => $client['client_lga_code'],
                        'referral_state_code' => isset($client['referral_state']) ? $client['referral_state'] : null,
                        'referral_lga_code' => isset($client['referral_lga']) ? $client['referral_lga'] : null,
                        'reffered_to' => isset($client['reffered_to']) ? ($client['reffered_to'] == 0 ? null : $client['reffered_to'] ): null,
                        'firstname' => isset($client['firstname']) ? $client['firstname'] : null,
                        'surname' => isset($client['surname']) ? $client['surname'] : null,
                        'age' => isset($client['age']) ? $client['age'] : null,
                        //	'date_of_birth' => $client['date_of_birth'],
                        'estimated' => isset($client['estimated']) ? Carbon::createFromFormat("d/m/Y", $client['estimated']) : null,
                        'sex' => isset($client['sex']) ? $client['sex'] : null,
                        'address' => isset($client['address']) ? $client['address'] : null,
                        'address_2' => isset($client['address_2']) ? $client['address_2'] : null,
                        'address_3' => isset($client['address_3']) ? $client['address_3'] : null,
                        'care_giver_name' => isset($client['care_giver_name']) ? $client['care_giver_name'] : null,
                        'phone_number' => isset($client['phone_number']) ? $client['phone_number'] : null,
                        'form_date' => isset($client['form_date']) ? Carbon::createFromFormat("d/m/Y",$client['form_date']) : null,
                        'current_result' => isset($client['current_result']) ? $client['current_result'] : null,
                        'hiv_test_date' => isset($client['hiv_test_date']) ? Carbon::createFromFormat("d/m/Y", $client['hiv_test_date']) : null,
                        'comment' => isset($client['comment']) ? $client['comment'] : null,
                        'previously_tested' => isset($client['previously_tested']) ? $client['previously_tested'] : null,
                        'previous_result' => isset($client['previous_result']) ? $client['previous_result'] : null,
                        'date_of_test' => isset($client['date_of_test']) ? Carbon::createFromFormat("d/m/Y", $client['date_of_test']) : null,
                        'testing_point' => isset($client['testing_point']) ? $client['testing_point'] : null,
                        'client_reported' => isset($client['client_reported']) ? $client['client_reported'] : null,
                        //		'date_client_reported' => $client['date_client_reported'],
                        'session_type' => isset($client['session_type']) ? $client['session_type'] : null,
                        'is_index_client' => isset($client['is_index_client']) ? $client['is_index_client'] : null,
                        'index_client_id' => isset($client['index_client_id']) ? $client['index_client_id'] : null,
                        'index_type' => isset($client['index_type']) ? $client['index_type'] : null,
                        'referral_date' => isset($client['referral_date']) ? Carbon::createFromFormat("d/m/Y", $client['referral_date']) : null,
                        'client_identifier' => isset($client['client_identifier']) ? $client['client_identifier'] : null,
                        'client_village' => isset($client['client_village']) ? $client['client_village'] : null,
                        'client_geo_code' => isset($client['client_geo_code']) ? $client['client_geo_code'] : null,
                        'marital_status' => isset($client['marital_status']) ? $client['marital_status'] : null,
                        'employment_status' => isset($client['employment_status']) ? $client['employment_status'] : null,
                        'religion' => isset($client['religion']) ? $client['religion'] : null,
                        'education_level' => isset($client['education_level']) ? $client['education_level'] : null,
                        'hiv_recency_test_type' => isset($client['hiv_recency_test_type']) ? $client['hiv_recency_test_type'] : null,
                        'hiv_recency_test_date' => isset($client['hiv_recency_test_date']) ? Carbon::createFromFormat("d/m/Y", $client['hiv_recency_test_date']) : null,
                        'final_recency_test_result' => isset($client['final_recency_test_result']) ? $client['final_recency_test_result'] : null,
                        'risk_age_group' => isset($client['risk_age_group']) ? $client['risk_age_group'] : null,
                        'risk_test_date' => isset($client['risk_test_date']) ? Carbon::createFromFormat("d/m/Y", $client['risk_test_date'] ) : null,
                        'risk_stratification' => isset($client['risk_stratification']) ? $client['risk_stratification'] : null,
                        'risk_test_result' => isset($client['risk_test_result'])? $client['risk_test_result'] : null,
                        'traced' => isset($client['traced']) ? $client['traced'] : null,
                        'stopped_at_pre_test' => isset($client['stopped_at_pre_test']) ? $client['stopped_at_pre_test'] : null,
                        'client_confirmed' => isset($client['client_confirmed']) ? $client['client_confirmed'] : null,
                        //		'date_client_confirmed' => $client['date_client_confirmed'],
                        'app_version_number' => isset($client['app_version_number']) ? $client['app_version_number'] : null,
                        'pre_test_counsel' => isset($client['pre_test_counsel']) ? $client['pre_test_counsel'] : null,
                        'post_test_councel' => isset($client['post_test_councel']) ? $client['post_test_councel'] : null,
                        'post_tested_before_within_this_year' => isset($client['post_tested_before_within_this_year']) ? $client['post_tested_before_within_this_year'] : null,
                        'pretest_json' => isset($client['pretest_json']) ? $client['pretest_json'] : null,
                        'eligibility_level' => isset($client['eligibility_level']) ? $client['eligibility_level'] : null,
                        'services' => isset($client['services']) ? $client['services'] : null,
                        'spoke_id' => isset($client['spoke_id']) ? $client['spoke_id'] : null,
                    ]);

                        if (isset($client['finger_print'])){
                            FingerPrint::create([
                                'client_id' => $client_info->id,
                                    'client_identifier' => $client_info->client_identifier,
                                    'finger_print_capture' => $client['finger_print']
                                ]);
                        }

                    $client_ids[] = $client['form_id'].":".$client_info->id;
                }

                return response()->json(implode($client_ids, ","), 200);
            }else{
                return response()->json([
                    'code' => '02',
                    'message' => 'User could not be found or user does not have the facility role'
                ], 401);
            }
        }else{
            return response()->json([
                'code' => '02',
                'message' => 'No user was found linked to post'
            ], 401);
        }


	}

    public function clients()
    {
        return response()->json([
            'code' => '01',
            'clients' => ClientResource::collection(Client::where('stopped_at_pre_test', 0)->get()),
            'message' => 'Successful'
        ], 200);
    }

    public function clients_by_facility($datim_code){
	    $facility = Facility::where('code', $datim_code)->first();
	    if ($facility != null){
            return response()->json([
                'code' => '01',
                'clients' => ClientResource::collection($facility->clients),
                'message' => 'Successful'
            ], 200);
        }else{
            return response()->json([
                'code' => '01',
                'clients' => null,
                'message' => 'No clients'
            ], 200);
        }
    }

    public function post_sync_clients(Request $request){
	    $client_identifiers = $request->successful_ids;

	    Client::whereIn('client_identifier', $client_identifiers)->update(array('synced' => 1));

        return response()->json($client_identifiers, 200);

    }

}
