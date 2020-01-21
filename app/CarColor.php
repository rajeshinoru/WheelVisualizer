<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    protected $table = 'car_colors';
	protected $fillable = [
		'vif',
		'code',
		'evoxcode',
		'name',
		'rgb1',
		'rgb2',
		'simple',
		'shot'
	];

}


