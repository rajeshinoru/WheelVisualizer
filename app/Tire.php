<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    //



    public function TireDetails(){
    	return $this->hasOne('App\TireDetail','part_no','part_no');
    }

	// public function CarColors(){
	// 	return $this->hasMany('App\CarColor','vif','vif');
	// }
}
