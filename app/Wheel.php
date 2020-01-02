<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Wheel extends Model
{

    use SoftDeletes;

       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'part_no','brand','style','finish','image','boldpattern1','boldpattern2','boldpattern3','offset1','offset2','simpleoffset','wheeltype','wheeldiameter','wheelwidth','hub','frontimage','rearimage'
    ];


}
