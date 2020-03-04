<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
	public function facilities()
	{
		return $this->hasMany('App\Facility', 'lga_code', 'lga_code');
	}

	public function state()
	{
		return $this->belongsTo('App\State', 'state_code', 'state_code');
	}
}
