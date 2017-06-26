<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    
    public function getIndex()
    {
        $posts=Post::orderBy('id','DESC')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
        $firstname='Lloric';
        $lastname='Garcia';
        $fullname=$firstname.' '.$lastname;
        
        $data=array(
            'fullname'=>$fullname,
            'email'=>'email@email.com'
        );

        return view('pages.about')->with($data);
    }

    public function getContact()
    {
        return view('pages.contact');
    }
    
}
