<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class SubAdminRole extends Model
{
    //


    // use SoftDeletes;

    protected $fillable = ['adminid','read','write'];
}
