<?php

use Faker\Generator as Faker;
use App\User;
use App\Model\Facility;
use App\Role;

$factory->define(User::class, function (Faker $faker) {
	$count_user = User::all()->count();
	$sex = array('male', 'female');

    return [
    	'name' => $faker->name,
	    'email' => $faker->unique()->safeEmail,
	    'created_by' => $count_user != 0 ? rand(1, $count_user) : NULL,
	    'sex'=> $sex[rand(0, 1)],
	    'address' => $faker->address,
	    'phone' => $faker->phoneNumber,
	    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	    'remember_token' => str_random(10),
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
	$count = rand(1, Role::all()->count());
	$count_facilities = Facility::all()->count();

	$query = 'INSERT INTO `role_user` (`role_id`, `user_type`, `user_id`) VALUES
        		('.$count.', "App\\\User",'.$user->id.')';
    DB::insert($query);

    if($count == 3){
	    $user->update([
			'facility_id' => $count_facilities != 0 ? rand(1, $count_facilities) : factory(App\Facility::class),
	    ]);
	}
});