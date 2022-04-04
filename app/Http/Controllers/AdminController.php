<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use DB;

class AdminController extends Controller
{
    function index()
    {
        $orders = DB::table('orders')
                    ->join('products','orders.product_id','=','products.id')
                    ->select('orders.*','products.image','products.name')
                    ->get();
        $order_status = ['Pending','Shipped','Delivered'];   
        return view('admin',['orders' => json_decode(json_encode($orders), true),'order_status' => $order_status]);
    }

    function updateOrderStatus(Request $request) 
    {    
        Order::where('id',$request->order_id)->update(['status'=>$request->status]);
        $request->session()->put('notification',['order_id' => $request->order_id]);
        return redirect('/admin');
    }
}
