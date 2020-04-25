<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

	protected $fillable = ['orderid','producttype','productid','qty','price','total'];
	
	public function WheelProducts(){

			return WheelProduct::find($this->productid);
	}
	public function Tires(){
		
			return Tire::find($this->productid);
	}
}
