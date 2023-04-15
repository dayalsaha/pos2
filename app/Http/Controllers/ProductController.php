<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function add_product(){
        $vendors = Vendor::all();
        $units = Unit::all();
        $categories = Category::all();
        return view('backend.add_product', [
            'vendors'=>$vendors,
            'units'=>$units,
            'categories'=>$categories,
        ]);
    }


    function store_product(Request $request){

        $request->validate([
            'name' => 'required|max:255',
            'vendor_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',

        ]);


        Product::insert([
            'vendor_id'=>$request->vendor_id,
            'unit_id'=>$request->unit_id,
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'quantity'=>'0',
            'created_by'=>Auth::user()->id,
        ]);

        return redirect()->route('view_product')->with('ad_product', 'Product added successfully');

    }

    function view_product(){
        $products = Product::all();
        return view('backend.view_product', [
            'products'=>$products,

        ]);
    }

    function edit_product($product_id){
            $product_info = Product::find($product_id);
            $vendors = Vendor::all();
            $units = Unit::all();
            $categories = Category::all();

            return view('backend.edit_product', [
                'product_info'=>$product_info,
                'vendors'=>$vendors,
                'units'=>$units,
                'categories'=>$categories,
            ]);
    }

    function update_product(Request $request){
        $product_id = $request->product_id;

        Product::find($product_id)->update([
            'vendor_id'=>$request->vendor_id,
            'unit_id'=>$request->unit_id,
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'quantity'=>'0',
            'updated_by'=>Auth::user()->id,
        ]);

        return redirect()->route('view_product')->with('up_product', 'Product Updated successfully');

    }

    function  del_product($product_id){
        Product::find($product_id)->delete();

        return redirect()->route('view_product')->with('del_product', 'Product deleted successfully');
    }




}
