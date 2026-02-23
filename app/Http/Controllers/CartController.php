<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        $key = $id . '-' . ($request->color ?? 'no-color') . '-' . ($request->size ?? 'no-size');

        if(isset($cart[$key])) {
            $cart[$key]['quantity'] += 1;
        } else {
            $cart[$key] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "price" => $product->discount_price ?? $product->original_price,
                "quantity" => 1,
                "image" => $product->images->first()?->image,
                "color" => $request->color,
                "size" => $request->size,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function remove($key)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return back();
    }

    public function count()
    {
        $cart = session()->get('cart', []);
        return collect($cart)->sum('quantity');
    }
    public function update(Request $request, $key)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$key])){
        if($request->action == 'increase'){
            $cart[$key]['quantity'] += 1;
        }

        if($request->action == 'decrease'){
            if($cart[$key]['quantity'] > 1){
                $cart[$key]['quantity'] -= 1;
            }
        }

        session()->put('cart', $cart);
    }

    return response()->json([
        'success' => true,
        'cart' => $cart
    ]);
}
}