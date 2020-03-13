<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chassis extends Model
{
    //






    public function PlusSizes() {
	    return $this->hasMany('App\PlusSize','chassis_id','chassis_id');
	}

}
