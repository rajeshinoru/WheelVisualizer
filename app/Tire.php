<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{


		protected $fillable = [
		'prodtitle',
		'prodbrand',
		'prodmodel',
		'prodmetadesc',
		'prodimage',
		'prodimageshow',
		'prodsortcode',
		'prodheaderid',
		'prodfooterid',
		'prodinfoid',
		'proddesc',
		'tirediameter',
		'tirewidth',
		'tireprofile',
		'tiresize',
		'speedrating',
		'loadindex',
		'ply',
		'utqg',
		'warranty',
		'detailtitle',
		'keywords',
		'partno',
		'price',
		'price2',
		'cost',
		'rate',
		'saleprice',
		'saletype',
		'salestart',
		'saleexp',
		'weight',
		'length',
		'width',
		'height',
		'shpsep',
		'shpfree',
		'shpcode',
		'shpflatrate',
		'partno_old',
		'metadesc',
		'qtyavail',
		'proddetailid',
		'productid',
		'dropshippable',
		'vendorpartno',
		'dropshipper',
		'vendorpartno2',
		'dropshipper2',
		'tiretype',
		'lt',
		'xl'
	];


    public function ChassisModels(){
    	return $this->hasMany('App\ChassisModel','tire_size','spec3');
    }
	// public function CarColors(){
	// 	return $this->hasMany('App\CarColor','vif','vif');
	// }
}
