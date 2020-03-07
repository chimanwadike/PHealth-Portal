<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
   
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('state_code')->nullable();
            $table->unsignedInteger('lga_code')->nullable();

            $table->string('name');
            $table->string('code');
            $table->string('contact_person_name');
            $table->string('contact_person_phone');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
