<?php

namespace App\Http\Controllers\auth_test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthTestController extends Controller
{
    public function getLogin(){
        return view('auth_test.login');
    }
    public function getRegister(){
        return view('auth_test.register');
    }
}
