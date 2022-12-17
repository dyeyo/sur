<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Products::with('images')->get();
        return view('welcome', compact('products'));
    }

    public function contact()
    {
        return view('contacts.contact');
    }
}
