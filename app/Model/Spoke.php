<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spoke extends Model
{
    //
    protected $guarded = [];

    public function clients()
    {
        return $this->hasMany('App\Model\Client', 'spoke_id', 'id');
    }

    public function facility()
    {
        return $this->belongsTo('App\Model\Facility', 'facility_id', 'id');
    }
}
