<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSPage extends Model
{
		protected $fillable = [
			'pagecategory',
			'title',
			'content',
			'routename',
		];

}
