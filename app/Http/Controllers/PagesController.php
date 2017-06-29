<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;
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

    public function postContact(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'required|alpha_dash|min:3',
            'message'=>'min:5'
        ]);
        
        $data=[
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
        ];

        Mail::send('emails.contact',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('reciever@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','Your Email has sent!');
        return redirect('/');
    }
    
}
