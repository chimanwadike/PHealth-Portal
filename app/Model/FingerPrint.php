<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FingerPrint extends Model
{
    protected $guarded = [];

    public function client(){
        return $this->belongsTo('App\Model\Client', 'client_id', 'id');
    }
}
