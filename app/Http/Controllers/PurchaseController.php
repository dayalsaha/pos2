<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Unit;
use App\Models\Vendor;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    function add_purchase(){

        $vendors = Vendor::all();
        $units = Unit::all();
        $categories = Category::all();
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('backend.add_purchase', [
            'vendors'=>$vendors,
            'units'=>$units,
            'categories'=>$categories,
            'products'=>$products,
            'warehouses'=>$warehouses,
        ]);
    }

    public function getcategory(Request $request){
        $vendor_id = $request->vendor_id;
      dd($vendor_id);
    }

    function store_purchase(Request $request){

        $sub_total = $request->price*$request->qty;
        $total_amount = $sub_total-$request->discount;

        $request->validate([
            'date' => 'required',
            'vendor_id' => 'required',
            'category_id' => 'required',
        ]);

        Purchase::insert([
            'vendor_id'=>$request->vendor_id,
            'category_id'=>$request->category_id,
            'warehouse_id'=>$request->warehouse_id,
            'product_id'=>$request->product_id,
            'date'=>$request->date,
            'purchase_no'=>$request->purchase_no,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'sub_total'=>$sub_total,
            'total_amount'=>$total_amount,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'created_by'=>Auth::user()->id,

        ]);

        return redirect()->route('list_purchase')->with('store_pur', 'Purchase added successfully');

    }

    function list_purchase(){
       $purchases = Purchase::all();

       return view('backend.list_purchase', [
        'purchases'=>$purchases,
       ]);
    }


    function del_purchase($purchase_id){

        Purchase::find($purchase_id)->delete();

        return redirect()->route('list_purchase')->with('del_pur', 'Purchase deleted successfully');
    }


    function status_purchase($purchase_id){

        Purchase::find($purchase_id)->update([
            'status'=>'1',
        ]);

        return redirect()->route('list_purchase')->with('up_pur', 'Purchase deleted successfully');
    }

    function edit_purchase($purchase_id){
        $purchase_info = Purchase::all($purchase_id);
        $purchases = Purchase::all();
        $vendors = Vendor::all();
        $units = Unit::all();
        $categories = Category::all();
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('backend.edit_purchase', [
            'purchases'=>$purchases,
            'purchase_info'=>$purchase_info,
            'vendors'=>$vendors,
            'units'=>$units,
            'categories'=>$categories,
            'products'=>$products,
            'warehouses'=>$warehouses,
        ]);
    }







}
