<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLgasTable extends Migration
{
    public function up()
    {
        Schema::create('lgas', function (Blueprint $table) {
            $table->increments('lga_code');

            $table->unsignedInteger('state_code');

            $table->string('lga_name');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lgas');
    }
}
