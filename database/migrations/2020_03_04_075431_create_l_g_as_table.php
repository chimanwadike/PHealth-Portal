<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLGAsTable extends Migration
{
    public function up()
    {
        Schema::create('l_g_as', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('state_id');

            $table->string('lga_name');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('l_g_as');
    }
}
