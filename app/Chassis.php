<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chassis extends Model
{
    //

	protected $fillable = [
		'chassis_id',
		'pcd',
		'centre_bore',
		'centre_borer',
		'max_wheel_load',
		'nutbolt',
		'nutbolt_thread_type',
		'nutbolt_hex',
		'boltlength',
		'min_bolt_length',
		'max_bolt_length',
		'nutbolt_torque',
		'front_vehicle_track',
		'rear_vehicle_track',
		'max_rim_width',
		'min_rim_width',
		'max_rim_width_front',
		'max_rim_width_rear',
		'max_et_front',
		'min_et_front',
		'max_et_rear',
		'min_et_rear',
		'gvw',
		'max_speed',
		'front_axle_weight',
		'rear_axle_weight',
		'kerb_weight',
		'caliper',
		'oe_tire_description',
		'tpms',
		'xfactor',
	];





    public function PlusSizes() {
	    return $this->hasMany('App\PlusSize','chassis_id','chassis_id');
	}



    public function ChassisModels() {
	    return $this->hasMany('App\ChassisModel','chassis_id','chassis_id');
	}



}
