<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Order Index
   public function orderIndex(){
       $orders = Order::latest()->get();
       return view('admin.order.index',compact('orders'));
   }

   // Order View
//   public function viewOrder(){
//       $orders = Order::latest()->get();
//       return view('admin.order.index',compact('orders'));
//   }

}
