<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToFacilicies extends Migration
{
    public function up()
    {
        $table->foreign('state_id')
          ->references('id')->on('states')
          ->onUpdate('cascade')
          ->onDelete('set null');

        $table->foreign('LGA_id')
          ->references('id')->on('l_g_as')
          ->onUpdate('cascade')
          ->onDelete('set null');
    }

    public function down()
    {
        $table->dropForeign(['state_id']);
        $table->dropForeign(['LGA_id']);
    }
}
