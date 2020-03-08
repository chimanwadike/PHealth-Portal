<?php

use Faker\Generator as Faker;
use App\Model\Client;


$factory->define(Model::class, function (Faker $faker) {
    $count_user = User::all()->count();
    $count_state = State::all()->count();
    $state = State::where('state_code', 1)->get()->first();

    return [
        'state_code' => $state->state_code,
		'lga_code' => $state->lgas->first()->lga_code,
		'name' => $faker->company,
		'code' => $faker->postcode,
		'contact_person_name' => $faker->name,
        'contact_person_phone' => $faker->phoneNumber,
        'created_by' => $count_user != 0 ? rand(1, $count_user) : NULL,
    ];
});
