<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class HomeController extends Controller
{
    public function index()
    {
        $sapArr = Config::get('oilnameandsap.sap');
        return view('home.index', compact('sapArr'));
    }
}
