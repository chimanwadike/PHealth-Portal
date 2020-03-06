<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    protected $fillable = [
        'name', 'email', 'password','profile_image', 'created_by', 'facility_id', 'sex', 'address', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function uploaded_clients()
	{
		return $this->hasMany('App\Client', 'UserId', 'id');
	}

    public function getUserProfileAttribute()
    {
        return asset('storage/'.$this->profile_image);
    }
}
