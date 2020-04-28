<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = [];

    public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function facility()
	{
		return $this->belongsTo('App\Model\Facility', 'facility_id', 'id');
	}

	public function client_state()
	{
		return $this->belongsTo('App\Model\State', 'client_state_code', 'state_code');
	}

	public function client_lga()
	{
		return $this->belongsTo('App\Model\Lga', 'client_lga_code', 'lga_code');
	}

	public function referral_state()
	{
		return $this->belongsTo('App\Model\State', 'referral_state_code', 'state_code');
	}

	public function referral_lga()
	{
		return $this->belongsTo('App\Model\Lga', 'referral_lga_code', 'lga_code');
	}

	public function refered_to()
	{
		return $this->belongsTo('App\Model\Facility', 'reffered_to', 'id');
	}
}
