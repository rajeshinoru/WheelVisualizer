<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viflist extends Model
{

	protected $fillable = [
		'vif',
		'org',
		'send',
		'yr',
		'make',
		'model',
		'trim',
		'drs',
		'body',
		'cab',
		'whls',
		'vin',
		'date_delivered',
	];




	public function CarImages(){
		return $this->hasMany('App\CarImage','car_id','vif');
	}
	public function CarColors(){
		return $this->hasMany('App\CarColor','vif','vif');
	}
}
