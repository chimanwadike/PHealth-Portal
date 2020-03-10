<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('facility_id')->nullable();
            $table->unsignedInteger('client_state_code')->nullable();
            $table->unsignedInteger('client_lga_code')->nullable();
            $table->unsignedInteger('referral_state')->nullable();
            $table->unsignedInteger('referral_lga')->nullable();
            $table->unsignedInteger('reffered_to')->nullable(); // --LINKED TO FACILITY TABLE

            $table->string('firstname', 50)->nullable();
            $table->string('surname', 50)->nullable();
            $table->integer('age')->nullable();
            $table->datetime('date_of_birth')->nullable();
            $table->datetime('estimated')->nullable();
            $table->string('sex', 50)->nullable();
            $table->longText('address')->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->datetime('form_date')->nullable();
            $table->string('current_result', 50)->nullable();
            $table->datetime('hiv_test_date')->nullable();
            $table->longText('comment')->nullable();
            $table->integer('previously_tested')->nullable();
            $table->string('previous_result', 50)->nullable();
            $table->datetime('date_of_test')->nullable();
            $table->longText('testing_point')->nullable();
            $table->integer('client_reported')->nullable();
            $table->datetime('date_client_reported')->nullable();
            $table->string('session_type', 50)->nullable();
            $table->integer('is_index_client')->nullable();
            $table->string('index_client_id', 50)->nullable();
            $table->string('index_type', 50)->nullable();
            $table->datetime('referral_date')->nullable();
            $table->string('client_identifier', 50)->nullable();
            $table->string('client_village', 50)->nullable();
            $table->string('client_geo_code', 50)->nullable();
            $table->string('marital_status', 50)->nullable();
            $table->string('employment_status', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('education_level', 50)->nullable();
            $table->string('hiv_recency_test_type', 50)->nullable();
            $table->datetime('hiv_recency_test_date')->nullable();
            $table->string('final_recency_test_result', 50)->nullable();
            $table->string('risk_age_group', 50)->nullable();
            $table->datetime('risk_test_date')->nullable();
            $table->longText('risk_stratification')->nullable();
            $table->string('risk_test_result', 50)->nullable();
            $table->integer('traced')->nullable();
            $table->integer('stopped_at_pre_test')->nullable();
            $table->integer('client_confirmed')->nullable();
            $table->datetime('date_client_confirmed')->nullable();
            $table->integer('app_version_number')->nullable();
            $table->longText('pre_test_counsel')->nullable();
            $table->longText('post_test_councel')->nullable();
            $table->string('post_tested_before_within_this_year', 500)->nullable();
            $table->longText('pretest_json')->nullable();
            $table->integer('facility_client_reported')->nullable();
            $table->string('eligibility_level', 50)->nullable();
            $table->integer('delete_flag')->nullable();
            $table->longText('services')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
