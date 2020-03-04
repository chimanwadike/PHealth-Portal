<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToFacilicies extends Migration
{
    public function up()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->foreign('state_id')
              ->references('id')->on('states')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('lga_id')
              ->references('id')->on('lgas')
              ->onUpdate('cascade')
              ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
            $table->dropForeign(['lga_id']);
        });
    }
}
