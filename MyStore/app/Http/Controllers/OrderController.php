<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_item;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $orders = $user->orders;
        return view('user.order.index' , compact('orders'));

    }

    public function create()
    {
        $products=Product::all();
        return view('user.order.create' , compact('products'));
    }

    public function store(Request $request )
    {
        $request->validate([
            'product_ids'   => ['array'],
            'product_ids.*' => ['integer' , 'required' , 'exists:products,id'],
            'quantities'    => ['array'],
            'quantities.*'  => ['integer' , 'required']
        ]);

        $products_ids = $request->product_ids;
        $quantities   = $request->quantities;

        $order = new order();
        $order->user_id     = Auth::user()->id;
        $order->total_price = 0;
        $order->save();

        $total_price=0;
        for($i=0 ; $i<count($products_ids) ; $i++){
            $product = Product::find($products_ids[$i]);


            $order_item = new order_item();
            $order_item->order_id        = $order->id;
            $order_item->product_id      = $products_ids[$i] ;
            $order_item->quantity        = $quantities[$i];
            $order_item->price_per_item  = $product->price;
            $order_item->price           = $product->price * $quantities[$i];
            $order_item->save();

            $total_price+=$order_item->price;
        }

        $order->total_price = $total_price;
        $order->save();
        return redirect()->route('user_orders')
                        ->with('success','Order created successfully.');
    }

    public function all_orders()
    {
        $orders = order::all();

        return view('admin.order.index' , compact('orders'));
    }

    public function filter_orders(User $user)
    {
        $orders = $user->orders;
        return view('admin.order.index' , compact('orders'));
    }



    public function order_items(order $order)
    {
        $order_items = order_item::with('product')->where('order_id' , $order->id)->get();

        return view('user.order.show_order' , compact('order_items'));
    }

    public function reject_order(order $order)
    {
        if ($order->statue != 'pending')
        {
            return redirect()->back();
        }else{
            $order->statue = 'rejected';
            $order->save();
            return redirect()->route('all_orders')
                            ->with('success','Order is rejected.');
        }
    }

    public function accepte_order(order $order)
    {
        if ($order->statue != 'pending')
        {
            return redirect()->back();
        }else{
            $order->statue = 'accepted';
            $order->save();
            return redirect()->route('all_orders')
                            ->with('success','Order is accepted.');
        }
    }
}
