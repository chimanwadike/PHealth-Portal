<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	public function lgas()
	{
		return $this->hasMany('App\Lga', 'state_code', 'state_code');
	}

	public function facilities()
	{
		return $this->hasMany('App\Facility', 'state_code', 'state_code');
	}
}
