<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

	protected $fillable = ['orderid','producttype','productid','qty','price','total'];
	
}
