<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //


    public function Ratings() {
	    return $this->hasMany('App\Rating','review_id');
	}

    public function Product() {
	    return $this->belongsTo('App\WheelProduct','partno','partno');
	}
}
