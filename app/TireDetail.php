<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TireDetail extends Model
{
    protected $fillable=[
		'part_no',
		'price',
		'price2',
		'cost',
		'rate',
		'sale_price',
		'sale_type',
		'sale_start',
		'sale_exp',
		'weight',
		'length',
		'width',
		'height',
		'shp_sep',
		'shp_free',
		'shp_code',
		'shp_flatrate',
		'partno_old',
		'meta_desc',
		'qty_avail',
		'prod_detail_id',
		'product_id',
		'drop_shippable',
		'vendor_part_no',
		'drop_shipper',
		'vendor_partno2',
		'drop_shipper2',
		'tire_type',
	];
}
