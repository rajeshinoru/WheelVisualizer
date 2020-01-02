<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{


	protected $fillable = [
		'id',
		'car_id',
		'cc',
		'color_code',
		'image'
	];


	public function CarViflist(){
		return $this->hasOne('App\Viflist','vif','car_id');
	}


	public function CarColor(){
		return $this->hasMany('App\CarColor','vif','car_id');
	}
}
