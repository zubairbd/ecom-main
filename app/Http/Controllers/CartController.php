<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Request $request,$product_id){
        $check = Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
        if ($check){
            Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('qty');
            return Redirect()->back()->with('success','Product added on Cart');
        }else{
            Cart::insert([
                'product_id'=> $product_id,
                'qty'=> 1,
                'price'=> $request->price,
                'user_ip'=> $request->ip(),
            ]);
            return Redirect()->back()->with('success','Product added on Cart');
        }
    }

    // Cart Page
    public function CartPage(){
        $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function ($t){
            return $t->price * $t->qty;
        });
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        return view('fontend.cart',compact('carts','subtotal'));
    }

    // Cart Destory
    public function Destory($cart_id){
        Cart::where('id',$cart_id)->where('user_ip',request()->ip())->delete();
        return Redirect()->back()->with('cart_delete','Cart Product Remove');
    }


    //Cart QuantityUpdate
    public function QuantityUpdate(Request $request,$cart_id){
        Cart::where('id',$cart_id)->where('user_ip',request()->ip())->update([
            'qty'=> $request->qty,
        ]);
        return Redirect()->back()->with('cart_update','Cart Product Update');
    }


    //======== Coupon =================
    public function CouponApply(Request $request){
        $check = Coupon::where('coupon_name',$request->coupon_name)->first();
        if($check){
            Session::put('coupon',[
                'coupon_name'=> $check->coupon_name,
                'coupon_discount'=> $check->discount,
            ]);
            return Redirect()->back()->with('cart_update','Coupon Added Successfully');
        }else{
            return Redirect()->back()->with('cart_delete','Invalid Coupon');
        }
    }

    // coupon destroy
    public function couponDestroy(){
        if (Session::has('coupon')) {
            session()->forget('coupon');
            return Redirect()->back()->with('cart_delete','Coupon Removed Success');
        }

    }
}
