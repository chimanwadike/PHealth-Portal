<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	public function lgas()
	{
		return $this->hasMany('App\Lga');
	}

	public function facilities()
	{
		return $this->hasMany('App\Facility');
	}
}
