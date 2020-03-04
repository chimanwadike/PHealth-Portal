<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
	public function facilities()
	{
		return $this->hasMany('App\Facility');
	}

	public function state()
	{
		return $this->belongsTo('App\State');
	}
}
