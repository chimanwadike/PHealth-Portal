<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	public function state()
	{
		return $this->belongsTo('App\Model\State', 'state_code', 'state_code');
	}

	public function lga()
	{
		return $this->belongsTo('App\Model\Lga', 'lga_code', 'lga_code');
	}

	public function clients()
	{
		return $this->hasMany('App\Model\Client', 'FacilityId', 'id');
	}

	public function by()
	{
		return $this->hasMany('App\User', 'FacilityId', 'id');
	}
}
