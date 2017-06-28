<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     *   belongs to tags
    */
    public function tags()
    {
       return $this->belongsToMany('App\Tag');
    }

}
