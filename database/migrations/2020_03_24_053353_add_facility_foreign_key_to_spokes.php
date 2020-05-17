<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacilityForeignKeyToSpokes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spokes', function (Blueprint $table) {
            //
            $table->foreign('facility_id')
                ->references('id')->on('facilities');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spokes', function (Blueprint $table) {
            //
        });
    }
}
