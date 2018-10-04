<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // home
    public function home()
    {
        return view('index.home');
    }
}
