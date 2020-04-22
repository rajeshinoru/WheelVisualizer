<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = [
		'firstname','lastname','companyname','email','dayphone','cellphone','address','address2','state','zip','same_shipping',
		'shipping_firstname','shipping_lastname','shipping_companyname','shipping_email','shipping_dayphone','shipping_cellphone',
		'shipping_address','shipping_address2','shipping_state','shipping_zip','make','year','model','trim','vehicle_modified',
		'big_brake_kit','raised_lowered','modified_notes','notes','subtotal','fees','tax','shipping','total','payment_status',
		'status'
	];


}
