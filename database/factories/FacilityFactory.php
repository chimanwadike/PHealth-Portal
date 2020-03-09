<?php

use Faker\Generator as Faker;
use App\Model\Facility;
use App\Model\State;
use App\User;

$factory->define(Facility::class, function (Faker $faker) {
    $count_user = User::all()->count();
    $count_state = State::all()->count();
    $state = State::where('state_code', rand(1, $count_state))->get()->first();

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
