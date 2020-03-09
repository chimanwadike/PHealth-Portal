<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToClients extends Migration
{
    
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('facility_id')
              ->references('id')->on('facilities')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('client_state_code')
              ->references('state_code')->on('states')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('client_lga_code')
              ->references('lga_code')->on('lgas')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('referral_state')
              ->references('state_code')->on('states')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('referral_lga')
              ->references('lga_code')->on('lgas')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('reffered_to')
              ->references('id')->on('facilities')
              ->onUpdate('cascade')
              ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['facility_id']);
            $table->dropForeign(['client_state_code']);
            $table->dropForeign(['client_lga_code']);
            $table->dropForeign(['referral_state']);
            $table->dropForeign(['referral_lga']);
            $table->dropForeign(['reffered_to']);
        });
    }
}
