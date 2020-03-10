<?php

use Faker\Generator as Faker;
use App\Model\Client;
use App\Model\Facility;
use App\User;
use App\Model\State;

$factory->define(Client::class, function (Faker $faker) {
    $count_user = User::all()->count();
    $count_state = State::all()->count();
    $count_facility = Facility::all()->count();
    $state = State::where('state_code', rand(1, $count_state))->get()->first();
    $facility = Facility::find(rand(1, $count_facility));
    $sex = array('male', 'female');
    $facility_users = User::whereRoleIs('facility')->get()->pluck('id');

    return [
        'user_id' => $facility_users[rand(0, (count($facility_users) - 1))],
        'facility_id' => $facility->id,
        'client_state_code' => $state->state_code,
        'client_lga_code' => $state->lgas->first()->lga_code,
        'referral_state' => $state->state_code,
        'referral_lga' => $state->lgas->first()->lga_code,
        'reffered_to' => $facility->id,
        'firstname' => $faker->firstNameMale,
        'surname' => $faker->lastName,
        'age' => rand(30, 70),
        'date_of_birth' => $faker->dateTime($max = 'now', $timezone = null),
        'sex' => $sex[rand(0, 1)],
        'address' => $faker->streetAddress,
        'phone_number' => $faker->phoneNumber,
        'services' => $faker->jobTitle,
    ];
});
