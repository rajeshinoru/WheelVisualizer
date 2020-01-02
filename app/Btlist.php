<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Btlist extends Model
{
	protected $fillable = [
		'vehicle_id',
		'market',
		'model_year',
		'make',
		'model',
		'trim',
		'doors',
		'body',
		'cab',
		'drive',
		'closest_vif_match',
		'delivered_btl',
		'delivered_nrl',
		'delivered_fll',
		'delivered_tll',
	];




	public function CarImages(){
		return $this->hasMany('App\CarImage','car_id','vehicle_id');
	}

}
