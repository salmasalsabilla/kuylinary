<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashminController extends Controller
{
    public function __construct(){
        if(!Sessioon::has('username')){
            redirect('loginadmin')->send();
        }
    }

    public function index(){
        return view('loginadmin.layout');
    }

}
