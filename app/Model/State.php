<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $guarded = [];
	
	public function lgas()
	{
		return $this->hasMany('App\Model\Lga', 'state_code', 'state_code');
	}

	public function facilities()
	{
		return $this->hasMany('App\Model\Facility', 'state_code', 'state_code');
	}

	public function clients()
	{
		return $this->hasMany('App\Model\Client', 'ClientState', 'id');
	}
}
