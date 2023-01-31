<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {

        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.index');
        } else {

            return view('frontend.index');
        }
    }
}
