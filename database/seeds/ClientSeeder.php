<?php

use Illuminate\Database\Seeder;
use App\Model\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Client::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        factory(App\Model\Client::class, 200)->create();
    }
}
