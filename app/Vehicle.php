<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //


    public function ChassisModels(){
    	return $this->hasOne('App\ChassisModel','model_id','dr_model_id');
    }
}
