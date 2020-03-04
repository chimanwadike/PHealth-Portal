<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToFacilicies extends Migration
{
    public function up()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->foreign('state_code')
              ->references('state_code')->on('states')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('lga_code')
              ->references('lga_code')->on('lgas')
              ->onUpdate('cascade')
              ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropForeign(['state_code']);
            $table->dropForeign(['lga_code']);
        });
    }
}
