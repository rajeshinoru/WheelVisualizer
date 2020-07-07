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
}
