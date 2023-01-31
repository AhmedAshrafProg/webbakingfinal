<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about(){
        return view('frontend.about');
    }
    public function computer(){
        return view('frontend.computer');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function laptop(){
        return view('frontend.laptop');
    }
    public function product(){
        return view('frontend.product');
    }
}
