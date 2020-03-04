<?php

use Illuminate\Database\Seeder;
use App\Model\State;

class StateSeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        State::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        
    }
}
