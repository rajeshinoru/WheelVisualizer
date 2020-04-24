<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

	protected $fillable = ['orderid','producttype','productid','qty','price','total'];
	
	public function WheelProduct(){

			return $this->belongsTo('App\WheelProduct','id','productid');
	}
	public function Tire(){
		
			return $this->belongsTo('App\Tire','id','productid');
	}
}
