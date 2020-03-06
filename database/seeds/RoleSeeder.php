<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Role::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        Role::create(['name' => 'admin', 'display_name' => 'Super Administrator', 'description' => 'Super Administrator']);
        Role::create(['name' => 'coordinator', 'display_name' => 'Coordinator', 'description' => 'Coordinator']);
        Role::create(['name' => 'facility', 'display_name' => 'Facility', 'description' => 'Facility']);
    }
}
