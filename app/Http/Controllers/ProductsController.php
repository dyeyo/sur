<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::with('images')->get();
        dd($products);
        return view('products.list', compact('products'));
    }

    public function show($id)
    {
        $product = Products::with('images')->where('id', $id)->first();
        return view('products.detail', compact('product'));
    }

    public function addShoping(Products $product)
    {
        $product = Products::with('images')->where('id', $product)->get();
        return view('products.detail', compact('product'));
    }
}
