<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	protected $guarded = [];
	
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
		return $this->hasMany('App\Model\Client', 'facility_id', 'id');
	}

	public function created_by_()
	{
		return $this->belongsTo('App\User', 'created_by', 'id');
	}
}
