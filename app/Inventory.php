<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{


	protected $fillable = ['partno','vendor_partno','mpn','description','brand','model','location_code','available_qty','price','drop_shipper','ds_vendor_code','location_name','backupflag'];
	




    public function Dropshippers(){
    	return $this->hasMany('App\Dropshipper','code','location_name');
    }


}
