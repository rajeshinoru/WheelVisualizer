<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChassisModel extends Model
{

protected $fillable = [
			'chassis_id',
			'model_id',
			'p_lt',
			'tire_size',
			'load_index',
			'speed_index',
			'tire_pressure',
			'tire_size_r',
			'rim_size',
			'rim_size_r',
			'load_index_r',
			'speed_index_r',
			'tire_pressure_r',
			'model_laden_tp_f',
			'model_laden_tp_r',
			'run_flat_f',
			'run_flat_r',
			'extra_load_f',
			'extra_load_r',
			'tp_f_psi',
			'tp_r_psi',
			'ltp_f_psi',
			'ltp_r_psi'
		];
 
	public function Chassis() {
	    return $this->belongsTo('App\Chassis');
	}

}
