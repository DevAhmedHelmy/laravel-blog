<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
   /**
     * for <select></select>
     *
     * @var array
     */
    public static function dropdown(){
        return Category::pluck('name','id');
    }
}
