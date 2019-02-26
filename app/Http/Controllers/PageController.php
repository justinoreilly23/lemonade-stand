<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function formBuySupplies()
    {
        return view('supply');
    }

    public function proceed()
    {
        return view('continue');
    }

    public function simulate()
    {
        return view('simulate');
    }
    
    public function results()
    {
        return view('results');
    }
}
