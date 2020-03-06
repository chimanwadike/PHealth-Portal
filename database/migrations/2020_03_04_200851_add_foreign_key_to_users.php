<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('created_by')
              ->references('id')->on('users')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('facility_id')
              ->references('id')->on('facilities')
              ->onUpdate('cascade')
              ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['facility_id']);
        });
    }
}
