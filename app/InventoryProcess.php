<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryProcess extends Model
{


    protected $dateFormat = 'Y-m-d H:i:s';


    protected $dates = [ 
        'created_at',
        'started_at', 
        'updated_at', 
    ];

    protected $fillable = [
		'foldername',
		'dropshipper',
		'processid',
		'loopcount',
		'started_at',
    ];

 
}
