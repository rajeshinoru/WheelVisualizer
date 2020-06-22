<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //


    public function ChassisModels(){
    	return $this->hasOne('App\ChassisModel','model_id','dr_model_id');
    }

    public function Plussizes(){
    	return $this->hasMany('App\PlusSize','chassis_id','dr_chassis_id');
    }
}
