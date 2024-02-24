<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function homepage()
    {
        return view('site.homepage');
    }
}
