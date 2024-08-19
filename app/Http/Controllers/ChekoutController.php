<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChekoutController extends Controller
{
    public function index()
    {
        return view('website.checkout.index');
    }

    public function confirmOrder()
    {
        return view('website.checkout.confirm-order');
    }
}
