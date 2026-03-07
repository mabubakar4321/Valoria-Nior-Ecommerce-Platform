<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;




class WelcomeController extends Controller
{
    public function welcome(){
       $products=Product::with('images')->where('category_id',14)->get();
       $productss=Product::with('images')->where('category_id',13)->get();
       $kids=Product::with('images')->where('category_id',15)->get();
        return view('welcome',compact('products','productss','kids'));
    }

    
    public function about(){
        return view('about');
    }
    public function products(){
        $AllProducts=Product::with('images')->latest()->paginate(6);
        return view('products',compact('AllProducts'));
    }
    public function contact(){
        return view('contact');
    }

    public function singleproduct($id){
        $product = Product::with([
    'images',
    'category',
    'attributeValues.attribute'
])->findOrFail($id);

$groupedAttributes = $product->attributeValues
    ->groupBy(function ($item) {
        return $item->attribute->name;
    });
        return view('single-product',compact('product', 'groupedAttributes'));
    }


  public function addToFavourite($id)
{
    $product = Product::with('images')->findOrFail($id);

    $favourites = session()->get('favourites', []);

    if (!isset($favourites[$id])) {

        $image = null;

        if ($product->images->count() > 0) {
            $image = $product->images->first()->image;
        }

        $favourites[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->discount_price,
            'image' => $image
        ];
    }

    session()->put('favourites', $favourites);

     return response()->json([
        'success' => true,
        'count' => count(session('favourites', []))
    ]);
}
public function removeFromFavourite($id)
{
    $favourites = session()->get('favourites', []);

    if(isset($favourites[$id])) {
        unset($favourites[$id]);
        session()->put('favourites', $favourites);
    }

    return response()->json(['success' => true]);
}

public function favouriteList()
{
    return response()->json(session()->get('favourites', []));
}



public function addToCart(Request $request, $id)
{
    $product = \App\Models\Product::with('images')->findOrFail($id);

    $cart = session()->get('cart', []);

    $qty = (int) $request->input('quantity', 1);

    if ($qty < 1) {
        $qty = 1;
    }

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += $qty;
    } else {
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "sku" => $product->sku,
            "price" => $product->discount_price,
            "image" => $product->images->count()
                        ? $product->images->first()->image
                        : null,
            "quantity" => $qty
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'count' => array_sum(array_column($cart, 'quantity'))
    ]);
}

public function getCartData()
{
    return response()->json(session('cart', []));
}

public function removeFromCart($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return response()->json([
        'success' => true,
        'count' => count($cart)
    ]);
}

public function updateCartQty(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if (!isset($cart[$id])) {
        return response()->json(['success' => false]);
    }

    $qty = (int) $request->input('quantity');

    if ($qty < 1) {
        return response()->json(['success' => false]);
    }

    $cart[$id]['quantity'] = $qty;

    session()->put('cart', $cart);

    return response()->json(['success' => true]);
}
public function checkout()
{
    $cart = session()->get('cart', []);

    $total = 0;

    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    return view('checkout',compact('cart','total'));
}

public function placeOrder(Request $request)
{

    $cart = session()->get('cart', []);

    if(!$cart){
        return back();
    }

    $total = 0;

    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    $order = Order::create([
    'customer_name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'address' => $request->address,
    'total_amount' => $total,
    'status' => 'pending'
]);


   foreach($cart as $id => $item){

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $id,
        'quantity' => $item['quantity'],
        'price' => $item['price']
    ]);

}
    session()->forget('cart');

    return redirect()->route('order.success',$order->id);
}

public function myOrders()
{
    $orders = Order::latest()->get();

    return view('orders',compact('orders'));
}
public function downloadInvoice($id)
{
    $order = Order::with('items.product')->findOrFail($id);

    $pdf = PDF::loadView('invoice', compact('order'));

    return $pdf->download('invoice-'.$order->id.'.pdf');
}

public function orderSuccess($id)
{
    $order = Order::findOrFail($id);

    return view('order-success',compact('order'));
}

public function removeCart($id)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$id])){
        unset($cart[$id]);
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true
    ]);
}





}
