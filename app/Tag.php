<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     /**
     *   belongs to posts
    */
    public function posts()
    {
       return $this->belongsToMany('App\Post');
    }
    /**
     * for <select></select>
     *
     * @var array
     */
    public static function dropdown(){
        return Tag::pluck('name','id');
    }
}
