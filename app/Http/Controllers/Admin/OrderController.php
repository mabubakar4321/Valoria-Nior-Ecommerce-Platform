<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $query = Order::with('items.product')->latest();

        // SEARCH
        if($request->search){
            $query->where('customer_name','LIKE','%'.$request->search.'%');
        }

        // FILTER
        if($request->status){
            $query->where('status',$request->status);
        }

        $orders = $query->get();

        return view('Admin.orders.index',compact('orders'));
    }


     public function updateStatus(Request $request,$id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();

        return back()->with('success','Order Updated');
    }


    public function destroy($id)
    {

        $order = Order::findOrFail($id);

        $order->items()->delete();
        $order->delete();

        return back()->with('success','Order Deleted');

    }
}
