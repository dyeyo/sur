<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Products::with('images')->get();
        $id = Auth::id();
        return view('welcome', compact('products', 'id'));
    }

    public function contact()
    {
        return view('contacts.contact');
    }
}
