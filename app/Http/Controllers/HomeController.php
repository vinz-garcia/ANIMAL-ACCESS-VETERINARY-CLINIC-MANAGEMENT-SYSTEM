<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $data = "Welcome to Animal Access Veterinary Clinic";
        return view('home',['data'=>$data]);
    }
}
