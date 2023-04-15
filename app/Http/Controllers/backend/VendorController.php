<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{

    function add_vendor(){
        return view('backend.add_vendor');
    }


    function vendor_store(Request $request){

        $request->validate([
            'name' => 'required|max:255',
            'mobile_number' => 'required',
            'address' => 'required|max:255',
        ]);


        Vendor::insert([
            'name'=>$request->name,
            'mobile_number'=>$request->mobile_number,
            'email'=>$request->email,
            'address'=>$request->address,
            'created_by'=>Auth::user()->id,
        ]);

        return redirect()->route('view_vendor')->with('ad_vendor', 'vendor added successfully');
    }


    function  view_vendor(){
        $vendors =Vendor::all();
        return view('backend.view_vendor', [
            'vendors'=>$vendors,
        ]);
    }

    function edit_vendor($vendor_id){

        $vendors_info = Vendor::find($vendor_id);

        return view('backend.vendor_edit', [
            'vendors_info'=>$vendors_info,
        ]);

    }


    function update_vendor (Request $request){
            $vendor_id = $request->vendor_id;

        Vendor::find($vendor_id)->update([
            'name'=>$request->name,
            'mobile_number'=>$request->mobile_number,
            'email'=>$request->email,
            'address'=>$request->address,
            'updated_by'=>Auth::user()->id,
        ]);

        return redirect()->route('view_vendor')->with('up_vendor', 'vendor updated successfully');

    }


    function delete_vendor($vendor_id){
            Vendor::find($vendor_id)->delete();

            return redirect()->route('view_vendor')->with('del_vendor', 'vendor delete successfully');
    }





}
