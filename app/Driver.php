<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable = [
        'user_id', 'license', 'driverId', 'latitude', 'longitude'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
