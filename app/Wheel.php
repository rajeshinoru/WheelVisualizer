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
    // protected $fillable = [
    // 	'part_no','brand','style','finish','image','boldpattern1','boldpattern2','boldpattern3','offset1','offset2','simpleoffset','wheeltype','wheeldiameter','wheelwidth','hub','frontimage','rearimage'
    // ];
    protected $fillable = [
    'prodtitle','prodbrand','prodmodel','prodfinish','prodmetadesc','prodimage','prodimageshow','prodimagedually','prodsortcode','prodheaderid','prodfooterid','prodinfoid','proddesc','wheeltype','duallyrear','wheeldiameter','wheelwidth','boltpattern1','boltpattern2','boltpattern3','detailtitle','partno','price','price2','cost','rate','saleprice','saletype','salestart','saleexp','weight','length','width','height','shpsep','shpfree','shpcode','shpflatrate','partno_old','metadesc','qtyavail','proddetailid','productid','dropshippable','vendorpartno','dropshipper','vendorpartno2','dropshipper2','staggonly','rf_lc','offset1','offset2','hubbore'
    ];


}
