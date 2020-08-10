<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryProcess extends Model
{
    protected $fillable = [
		'foldername',
		'dropshipper',
		'processid',
		'loopcount',
		'started_at',
    ];

    protected $dates = [ 
        'created_at',
        'updated_at', 
		'started_at',
    ];

}
