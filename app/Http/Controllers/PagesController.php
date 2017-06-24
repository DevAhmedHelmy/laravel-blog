<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        # proccess vaaribles data or param
        # talk to the model
        # recieve from the model
        # compile or proccess data from the model if needed
        # pass that data to the correct view
        return view('pages.welcome');
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
