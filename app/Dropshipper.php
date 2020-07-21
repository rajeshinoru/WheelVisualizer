<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dropshipper extends Model
{
    protected $fillable=[
		'dropshipper',
		'code',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'allowshipsep2',
		'emailaddress',
		'ccemailaddress',
		'contactname',
		'bandable',
		'password'
    ];



	public function InventoryProducts() {
	    return $this->hasMany('App\Inventory','location_name','code');
	}
	
	public function scopeWithAndWhereHas($query, $relation, $constraint){
	    return $query->whereHas($relation, $constraint)
	                 ->with([$relation => $constraint]);
	}
}
