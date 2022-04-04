<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use DB;

class ProductController extends Controller
{
    function index()
    {  
        $data = Product::all();
        $highlight = Product::whereIn('id',['6','3','37'])->get();
        return view('product',['products' => $data,'highlight' => $highlight]);
    }

    function details($id)
    {
        $data = Product::find($id);
        return view('detail',['product' => $data]);
    }

    function addToCart(Request $request)
    {
        if($request->session()->has('user')) {
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        if(!empty(Session::get('user'))) {
            $userId = Session::get('user')['id'];
            return Cart::where('user_id',$userId)->count();
        } else {
            return 0;
        }
    }

    function cartlist()
    {   
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
                    ->join('products','cart.product_id','=','products.id')
                    ->where('cart.user_id',$userId)
                    ->select('products.*','cart.id as cart_id')
                    ->get();
        return view('cartlist',['products'=>$products]);

    }

    function removecart($id)
    {   
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function ordernow()
    {   
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
                    ->join('products','cart.product_id','=','products.id')
                    ->where('cart.user_id',$userId)
                    ->sum('products.price');
        return view('ordernow',['total'=>$total]);
    }

    function orderplace(Request $request)
    {   
        $userId = Session::get('user')['id']; 
        $cartData =  Cart::where('user_id',$userId)->get();
        foreach ($cartData as $key => $item) {
            
            $order = new Order;
            $order->product_id = $item->product_id;
            $order->user_id = $item->user_id;
            $order->status = "Pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "Pending";
            $order->address = $request->address;
            $order->save();
            Cart::where('id',$item->id)->delete();
        }

        return redirect('/');
    }

    function myorders()
    {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
                    ->join('products','orders.product_id','=','products.id')
                    ->where('orders.user_id',$userId)
                    ->get();
        return view('myorders',['orders'=>$orders]);
    }

    function orderDetail($id)
    {   
        Session::forget('notification');
        $order = DB::table('orders')
                    ->join('products','orders.product_id','=','products.id')
                    ->where('orders.id',$id)
                    ->first();
        return view('order_detail',['item'=>$order]);            
    }

}
