<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	$this->call(RoleSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(LgaSeeder::class);
   //     $this->call(FacilitySeeder::class);
        $this->call(UserSeeder::class);
//        $this->call(ClientSeeder::class);
    }
}
