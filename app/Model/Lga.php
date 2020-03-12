<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
	protected $guarded = [];
	
	public function facilities()
	{
		return $this->hasMany('App\Model\Facility', 'lga_code', 'lga_code');
	}

	public function state()
	{
		return $this->belongsTo('App\Model\State', 'state_code', 'state_code');
	}

	public function clients()
	{
		return $this->hasMany('App\Model\Client', 'client_lga_code', 'lga_code');
	}
}
