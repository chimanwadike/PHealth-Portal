<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'client_state_code' => $this->client_state_code,
            'client_lga_code' => $this->client_lga_code,
            'hiv_test_date' =>  $this->hiv_test_date,
            'firstname' => $this->firstname,
            'surname' => $this->surname,
            'age' => $this->age,
            'date_of_birth' => $this->date_of_birth,
            'estimated' => $this->estimated,
            'sex' => $this->sex,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'current_result' => $this->current_result,
            'previously_tested' => $this->previously_tested,
            'previous_result' => $this->previous_result,
            'date_of_test' => $this->date_of_test,
            'testing_point' => $this->testing_point,
            'session_type' => $this->session_type,
            'is_index_client' => $this->is_index_client,
            'index_client_id' => $this->index_client_id,
            'index_type' => $this->index_type,
            'client_identifier' => $this->client_identifier,
            'client_village' => $this->client_village,
            'client_geo_code' => $this->client_geo_code,
            'marital_status' => $this->marital_status,
            'employment_status' => $this->employment_status,
            'education_level' => $this->education_level,
            'hiv_recency_test_type' => $this->hiv_recency_test_type,
            'hiv_recency_test_date' => $this->hiv_recency_test_date,
            'final_recency_test_result' => $this->final_recency_test_result,
            'risk_age_group' => $this->risk_age_group,
            'risk_test_date' => $this->risk_test_date,
            'risk_test_result' => $this->risk_test_result,
            'post_tested_before_within_this_year' => $this->post_tested_before_within_this_year,
            'services' => $this->services,
            'risk_test_date' => $this->risk_test_date,
            'pre_test_counsel' => $this->process_pretest($this->pre_test_counsel),
            'post_test_councel' =>  json_decode($this->post_test_councel)[0],
            'risk_stratification' => $this->process_risk_stratification($this->risk_age_group, $this->risk_stratification),
            'finger_print' => json_decode($this->finger_prints)
        ];
    }

    private function process_pretest($pretest_data){
       $data =
           array('knowledge_assessment' => json_decode($pretest_data)[0],
               'risk_assessment' => json_decode($pretest_data)[1],
               'tb_screening' => json_decode($pretest_data)[2],
               'sti_screening' => json_decode($pretest_data)[3],
               'client_score' => json_decode($pretest_data)[4]
       );
       return $data ;
    }

    private function process_risk_stratification($group, $risk_data){
        $data = ''; //;
        if (strtolower($group) == "pediatrics"){
            $data = array(
                'pedRiskStratification' => json_decode($risk_data)[1],
                'riskScore' => json_decode($risk_data)[2]
            );
        }else{

            $data = array(
                'adultRiskStratification' => json_decode($risk_data)[0],
                'riskScore' => json_decode($risk_data)[2]
            );
        }

        return $data;
    }
}
