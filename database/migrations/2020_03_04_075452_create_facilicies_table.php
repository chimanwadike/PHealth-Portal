<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaciliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilicies', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('state_id');
            $table->unsignedInteger('LGA_id');

            $table->string('name');
            $table->string('code');
            $table->string('contact_person');

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
        Schema::dropIfExists('facilicies');
    }
}
