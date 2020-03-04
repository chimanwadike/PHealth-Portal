<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToLgas extends Migration
{
    public function up()
    {
        Schema::table('lgas', function (Blueprint $table) {
            $table->foreign('state_id')
              ->references('id')->on('states')
              ->onUpdate('cascade')
              ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('lgas', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
        });
    }
}
