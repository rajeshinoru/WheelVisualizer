<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

	protected $fillable = ['orderid','producttype','productid','qty','price','total'];
	
	public function ProductDetail(){
			if($this->producttype == 'tire'){

				return Tire::find($this->productid);
			}else{

				return WheelProduct::find($this->productid);
			}
	}
}
