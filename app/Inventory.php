<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{





	protected $fillable = ['partno','vendor_partno','mpn','description','brand','model','location_code','available_qty','price','drop_shipper','ds_vendor_code','location_name','backupflag'];
	

    protected $dates = [ 
        'created_at',
        'updated_at', 
    ];


    public function Dropshippers(){
    	return $this->hasMany('App\Dropshipper','code','location_name');
    }



    public function WheelProduct(){
    	return $this->belongsTo('App\WheelProduct','partno','partno');
    }


    public function Tire(){
    	return $this->belongsTo('App\WheelProduct','partno','partno');
    }

}
