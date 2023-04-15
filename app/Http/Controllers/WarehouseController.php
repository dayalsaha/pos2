<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    function add_warehouse(){
        return view('backend.add_warehouse');
    }

    function store_warehouse(Request $request){


            $request->validate([
                'name'=> 'required',
            ]);

            Warehouse::insert([
                'name'=>$request->name,
            ]);

            return redirect()->route('view_warehouse')->with('ad_warehouse', 'Warehouse added successfully');
    }

    function view_warehouse(){
        $warehouses = Warehouse::all();
        return view('backend.view_warehouse', [
            'warehouses'=> $warehouses,
        ]);
    }

    function del_warehouse($war_id){
        Warehouse::find($war_id)->delete();

        return redirect()->route('view_warehouse')->with('del_warehouse', 'Warehouse deleted successfully');
    }






}
