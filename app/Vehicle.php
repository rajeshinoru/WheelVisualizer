<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
	protected $fillable=[
		'dummy',
		'vehicle_id',
		'base_vehicle_id',
		'vif',
		'year',
		'make',
		'model',
		'submodel',
		'dr_chassis_id',
		'sort_by_vehicle_type',
		'year_make_model_submodel',
		'make_model_submodel',
		'wheel_type',
		'rf_lc',
		'offroad',
		'dually',
		'drive_type',
		'body_type',
		'body_number_doors',
		'bed_length',
		'vehicle_type',
		'liter',
		'region_id',
		'region',
		'custom_note',
		'body',
		'option',
		'dr_chassis_id_1',
		'dr_model_id ',
	];

    public function ChassisModels(){
    	return $this->hasOne('App\ChassisModel','model_id','dr_model_id');
    }

    public function Plussizes(){
    	return $this->hasMany('App\PlusSize','chassis_id','dr_chassis_id');
    }
    public function Offroads(){
    	return $this->hasMany('App\Offroad','offroadid','offroad');
    }
}
