<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->latest()->get();
        $newarrivalsp = Product::where('status',1)->latest()->get();
        $featurep = Product::where('status',1)->latest()->get();
//        $carts =  Cart::where('user_ip',request()->ip())->latest()->get();
//        $lts_prd = Product::where('status',1)->latest()->limit(3)->get();

//        return view('pages.index',compact('products','categories','lts_prd'));
        return view('fontend.index',compact('products','categories','newarrivalsp','featurep'));
    }

    // Product Details
    public function productDetails($product_id){
        $product = Product::findorFail($product_id);
        $categoryid = $product->category_id;
        $related_p = Product::where('category_id',$categoryid)->where('id','!=')->latest()->get();

        return view('pages.product-deatails',compact('product','related_p'));
    }


    // Shop Page
    public function shopPage(){
        $products = Product::latest()->get();
        $productsp = Product::latest()->paginate(3);
        $categories = Category::where('status',1)->latest()->get();
        return view('pages.shop',compact('products','categories','productsp'));
    }


}
