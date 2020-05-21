<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{	

	protected $fillable = [
		'request_to','name','email','message'
	];

}
