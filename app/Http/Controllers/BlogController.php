<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug){

        // fetch from the DB on slug
        $post = Post::where('slug','=',$slug)->first();

        // return the view and pass int the post onject
        return view('blog.single')->withPost($post);
    }
}
