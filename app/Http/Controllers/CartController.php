<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('website.cart.index', ['categories'    => Category::all(),]);
    }
}
