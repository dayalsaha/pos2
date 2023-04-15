<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    function add_unit(){
        return view('backend.add_unit');
    }

    function store_unit(Request $request){

        $request->validate([
            'name' => 'required|max:255',
        ]);

            Unit::insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,

            ]);

            return redirect()->route('view_unit')->with('ad_unit', 'Unit added successfully');


    }

    function  view_unit(){
        $units =Unit::all();
        return view('backend.view_unit', [
            'units'=>$units,
        ]);
    }

    function edit_unit($unit_id){
        $unit_info = Unit::find($unit_id);

        return view('backend.edit_unit', [
            'unit_info'=>$unit_info,
        ]);


    }


    function update_unit(Request $request){
        $unit_id = $request->unit_id;

        Unit::find($unit_id)->update([
            'name'=>$request->name,
            'Updated_by'=>Auth::user()->id,
        ]);

        return redirect()->route('view_unit')->with('up_unit', 'Unit updated successfully');

    }

    function del_unit($unit_id){
       Unit::find($unit_id)->delete();

        return redirect()->route('view_unit')->with('del_unit', 'Unit deleted successfully');
}





}
