<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChekoutController extends Controller
{
    public function index()
    {
        return view('website.checkout.index');
    }
}
