<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	public function state()
	{
		return $this->belongsTo('App\State');
	}

	public function lga()
	{
		return $this->belongsTo('App\Lga');
	}
}
