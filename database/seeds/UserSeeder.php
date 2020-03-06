<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        User::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        User::create([
            'name' => "Nuhu Ibrahim",
            'email' => "contactnuhuibrahim@gmail.com",
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
        ]);

        $query = 'INSERT INTO `role_user` (`role_id`, `user_type`, `user_id`) VALUES
                    (1, "App\\\User", 1)';
        DB::insert($query);
    }
}
