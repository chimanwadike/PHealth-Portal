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

        $user1 = User::create([
            'name' => "Administrator",
            'email' => "admin@caritasicf.org",
            'password' => bcrypt('secret'),
            'created_by' => NULL,
            'sex' => 'male',
            'address' => 'Kaduna - Nigeria',
            'phone' => '+234 7061 151 982'
        ]);

        $query = 'INSERT INTO `role_user` (`role_id`, `user_type`, `user_id`) VALUES
                    (1, "App\\\User",'. $user1->id .')';
        DB::insert($query);

//        $user2 = User::create([
//            'name' => "Chima Chima",
//            'email' => "contactchima@gmail.com",
//            'password' => '$2y$10$mC6.KsnYmkVuNtr6bwIeB.l9TZSbS/u/KrnJl6l/RmjmhRhRqx6x6',
//            'created_by' => NULL,
//            'sex' => 'male',
//            'address' => 'Abuja - Nigeria',
//            'phone' => '+234 7061 151 982'
//        ]);
//
//        $query = 'INSERT INTO `role_user` (`role_id`, `user_type`, `user_id`) VALUES
//                    (2, "App\\\User",'. $user2->id .')';
//        DB::insert($query);
//
//        $user3 = User::create([
//            'name' => "Chima Nuhu",
//            'email' => "contactnuhu@gmail.com",
//            'password' => '$2y$10$mC6.KsnYmkVuNtr6bwIeB.l9TZSbS/u/KrnJl6l/RmjmhRhRqx6x6',
//            'created_by' => NULL,
//            'sex' => 'male',
//            'address' => 'Lagos - Nigeria',
//            'phone' => '+234 7061 151 982',
//            'facility_id' => 1
//        ]);
//
//        $query = 'INSERT INTO `role_user` (`role_id`, `user_type`, `user_id`) VALUES
//                    (3, "App\\\User",'. $user3->id .')';
//        DB::insert($query);

//        factory(App\User::class, 20)->create();
    }
}
