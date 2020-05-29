<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = [
		'title','image','content','postby','user_id','is_visible'
	];


    public function comments()
    {
        return $this->hasMany('App\PostComment')->whereNull('comment_id');
    }

}
