<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToLGAs extends Migration
{
    public function up()
    {
        $table->foreign('state_id')
          ->references('id')->on('states')
          ->onUpdate('cascade')
          ->onDelete('cascade');
    }

    public function down()
    {
        $table->dropForeign(['state_id']);
    }
}
