<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user()
	{
		return $this->belongsTo('App\Model\User', 'UserId', 'id');
	}

	public function facility()
	{
		return $this->belongsTo('App\Model\Facility', 'FacilityId', 'id');
	}

	public function client_state()
	{
		return $this->belongsTo('App\Model\State', 'ClientState', 'state_code');
	}

	public function client_lga()
	{
		return $this->belongsTo('App\Model\Lga', 'ClientLga', 'lga_code');
	}

	public function referral_state()
	{
		return $this->belongsTo('App\Model\State', 'ReferralState', 'state_code');
	}

	public function referral_lga()
	{
		return $this->belongsTo('App\Model\Lga', 'ReferralLga', 'lga_code');
	}

	public function refered_to()
	{
		return $this->belongsTo('App\Model\Facility', 'RefferedTo', 'id');
	}
}
