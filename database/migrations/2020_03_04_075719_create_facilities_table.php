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

            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('lga_id')->nullable();

            $table->string('name');
            $table->string('code');
            $table->string('contact_person');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
