<?php

use Illuminate\Database\Seeder;
use App\Model\Facility;
use App\Model\State;
use App\Model\Lga;

class FacilitySeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Facility::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $state = State::where('state_code', 1)->get()->first();
        
        Facility::create([
        	'state_code' => $state->state_code,
			'lga_code' => $state->lgas->first()->lga_code,
			'name' => 'Gwagwalada Health Centre',
			'code' => '12',
			'contact_person' => 'Abdullahi Lawal',
		]);
    }
}
