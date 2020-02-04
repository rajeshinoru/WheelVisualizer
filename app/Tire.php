<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{


	protected $fillable = [
		'part_no','mpn','category5','prod_title','vendor','vendor_qty','vendor_cost','vendor_marked_up_price','simple_image','category1','category2','category3','category4','category6','pkeywords','csearch1','csearch2','csearch3','csearch4','csearch5','prod_weight','spec1','spec2','spec3','spec4','spec5','plt','xl','speed_mph','tier','vendor_code','vendor_website','vendor_phone','dsvendor_code','dsvendor_website','dsvendor_phone','dspart_no','drop_shippable','discoed','short_term_item','dsvendor','sale_price','dsvendor_cost','dsvendor_marked_up_price','update_date','ds_qty','ds_update_date','zero_qty_date',
	];

    public function TireDetails(){
    	return $this->hasOne('App\TireDetail','part_no','part_no');
    }

    public function ChassisModels(){
    	return $this->hasMany('App\ChassisModel','tire_size','spec3');
    }
	// public function CarColors(){
	// 	return $this->hasMany('App\CarColor','vif','vif');
	// }
}
