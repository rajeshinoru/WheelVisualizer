<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WheelProduct extends Model
{
    
	public function DifferentOffsets() {
	    return $this->hasMany('App\WheelProduct','wheeldiameter','wheeldiameter');
	}

	public function wheel() {
	    return $this->hasOne('App\Wheel','part_no','partno_old');
	}



	
}
