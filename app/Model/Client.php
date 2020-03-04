<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user()
	{
		return $this->belongsTo('App\User', 'UserId', 'id');
	}

	public function facility()
	{
		return $this->belongsTo('App\Facility', 'FacilityId', 'id');
	}

	public function client_state()
	{
		return $this->belongsTo('App\State', 'ClientState', 'state_code');
	}

	public function client_lga()
	{
		return $this->belongsTo('App\Lga', 'ClientLga', 'lga_code');
	}

	public function referral_state()
	{
		return $this->belongsTo('App\State', 'ReferralState', 'state_code');
	}

	public function referral_lga()
	{
		return $this->belongsTo('App\Lga', 'ReferralLga', 'lga_code');
	}

	public function refered_to()
	{
		return $this->belongsTo('App\Facility', 'RefferedTo', 'id');
	}
}
