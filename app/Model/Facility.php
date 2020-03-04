<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	public function state()
	{
		return $this->belongsTo('App\State', 'state_code', 'state_code');
	}

	public function lga()
	{
		return $this->belongsTo('App\Lga', 'lga_code', 'lga_code');
	}

	public function clients()
	{
		return $this->hasMany('App\Client', 'FacilityId', 'id');
	}
}
