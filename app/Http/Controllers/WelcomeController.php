<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $products = Product::with('images')
            ->latest()
            ->take(4)
            ->get();
        return view('welcome',compact('products'));
    }

    public function show($id)
    {
        $product = Product::with(['images','category','attributeValues.attribute'])
            ->findOrFail($id);

        return view('productdetail', compact('product'));
    }
}
