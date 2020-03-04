<?php

use Illuminate\Database\Seeder;
use App\Model\Lga;

class LgaSeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Lga::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }
}
