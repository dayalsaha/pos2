<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function add_category(){
        return view('backend.add_category');
    }

    function store_category(Request $request){

        $request->validate([
            'name' => 'required|max:255',
        ]);

            Category::insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,

            ]);

            return redirect()->route('view_category')->with('add_category', 'Category added successfully');

    }

    function view_category(){
        $categories = Category::all();
        return view('backend.view_category', [
            'categories'=>$categories,
        ]);
    }


    function edit_category($cat_id){
        $cat_info = Category::find($cat_id);

        return view('backend.edit_category', [
            'cat_info'=>$cat_info,
        ]);

    }


    function update_category(Request $request){

        $cat_id = $request->cat_id;

        Category::find($cat_id)->update([
            'name'=>$request->name,
            'updated_by'=>Auth::user()->id,
        ]);

        return redirect()->route('view_category')->with('up_category', 'Category updated successfully');

    }



    function del_category($cat_id){
       Category::find($cat_id)->delete();

        return redirect()->route('view_category')->with('del_cat', 'Category deleted successfully');
}





}
