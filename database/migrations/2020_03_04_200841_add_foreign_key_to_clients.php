<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToClients extends Migration
{
    
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('UserId')
              ->references('id')->on('users')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('FacilityId')
              ->references('id')->on('facilities')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('ClientState')
              ->references('state_code')->on('states')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('ClientLga')
              ->references('lga_code')->on('lgas')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('ReferralState')
              ->references('state_code')->on('states')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('ReferralLga')
              ->references('lga_code')->on('lgas')
              ->onUpdate('cascade')
              ->onDelete('set null');

            $table->foreign('RefferedTo')
              ->references('id')->on('facilities')
              ->onUpdate('cascade')
              ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['UserId']);
            $table->dropForeign(['FacilityId']);
            $table->dropForeign(['ClientState']);
            $table->dropForeign(['ClientLga']);
            $table->dropForeign(['ReferralState']);
            $table->dropForeign(['ReferralLga']);
            $table->dropForeign(['RefferedTo']);
        });
    }
}
