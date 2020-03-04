<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('Id');

            $table->unsignedInteger('UserId')->nullable();
            $table->unsignedInteger('FacilityId')->nullable();
            $table->unsignedInteger('ClientState')->nullable();
            $table->unsignedInteger('ClientLga')->nullable();
            $table->unsignedInteger('ReferralState')->nullable();
            $table->unsignedInteger('ReferralLga')->nullable();

            $table->unsignedInteger('RefferedTo')->nullable(); // --LINKED TO FACILITY TABLE

            $table->string('FirstName', 50)->nullable();
            $table->string('Surname', 50)->nullable();
            $table->integer('Age')->nullable();
            $table->datetime('DateOfBirth')->nullable();
            $table->datetime('Estimated')->nullable();
            $table->string('Sex', 50);
            $table->longText('Address')->nullable();
            $table->string('PhoneNumber', 50)->nullable();
            $table->datetime('FormDate')->nullable();
            $table->string('CurrentResult', 50)->nullable();
            $table->datetime('FormDate')->nullable();
            $table->datetime('HivTestDate')->nullable();
            $table->longText('Comment')->nullable();
            $table->integer('PreviouslyTested')->nullable();
            $table->string('PreviousResult', 50)->nullable();
            $table->datetime('DateofTest')->nullable();
            $table->longText('TestingPoint')->nullable();
            $table->integer('ClientReported')->nullable();
            $table->datetime('DateClientReported')->nullable();
            $table->string('SessionType', 50)->nullable();
            $table->integer('IsIndexClient')->nullable();
            $table->string('IndexClientId', 50)->nullable();
            $table->string('IndexType', 50)->nullable();
            $table->datetime('ReferralDate')->nullable();
            $table->string('ClientIdentifier', 50)->nullable();
            $table->string('ClientVillage', 50)->nullable();
            $table->string('ClientGeoCode', 50)->nullable();
            $table->string('MaritalStatus', 50)->nullable();
            $table->string('EmploymentStatus', 50)->nullable();
            $table->string('Religion', 50)->nullable();
            $table->string('EducationLevel', 50)->nullable();
            $table->string('HivRecencyTestType', 50)->nullable();
            $table->datetime('HivRecencyTestDate')->nullable();
            $table->string('FinalRecencyTestResult', 50)->nullable();
            $table->string('RiskAgeGroup', 50)->nullable();
            $table->datetime('RiskTestDate')->nullable();
            $table->longText('RiskStratification')->nullable();
            $table->string('RiskTestResult', 50)->nullable();
            $table->integer('Traced')->nullable();
            $table->integer('StoppedAtPreTest');
            $table->integer('ClientConfirmed')->nullable();
            $table->datetime('DateClientConfirmed')->nullable();
            $table->integer('App_version_number')->nullable();
            $table->longText('PreTestCounsel')->nullable();
            $table->longText('PostTestCouncel')->nullable();
            $table->string('PostTestedBeforeWithinThisYear', 500)->nullable();
            $table->longText('PretestJson')->nullable();
            $table->integer('FacilityClientReported')->nullable();
            $table->string('EligibilityLevel', 50)->nullable();
            $table->integer('DeleteFlag');
            $table->datetime('CreateDate')->nullable();
            $table->datetime('UpdateDate')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
