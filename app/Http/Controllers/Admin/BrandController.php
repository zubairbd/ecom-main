<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // ======= index page =======
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    // ============ store category =========
    public function Store(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:categories,category_name'
        ]);
        Brand::insert([
            'brand_name'=> $request->brand_name,
            'created_at'=> Carbon::now()
        ]);
        return Redirect()->back()->with('success','Brand added');
    }

    // ========= edit category data
    public function Edit($brand_id){
        $brand = Brand::findorFail($brand_id);
        return view('admin.brand.edit',compact('brand'));
    }

    // ============ UpdateCat category =========
    public function Update(Request $request){
        $brand_id = $request->id;
        Brand::findorFail($brand_id)->update([
            'brand_name'=> $request->brand_name,
            'updated_at'=> Carbon::now()
        ]);
        return Redirect()->route('admin.brand')->with('Catupdated','Brand Updated');

    }

    // ============ Delete category =========
    public function Delete($brand_id){
        Brand::findorFail($brand_id)->delete();
        return Redirect()->back()->with('delete','Brand Deleted Success');
    }

    // ============ Inactive category =========
    public function Inactive($brand_id){
        Brand::findorFail($brand_id)->update(['status' => 0]);
        return Redirect()->back()->with('Catupdated','Brand inactive');
    }
    // ============ active category =========
    public function Active($brand_id){
        Brand::findorFail($brand_id)->update(['status' => 1]);
        return Redirect()->back()->with('Catupdated','Brand Active');
    }
}
