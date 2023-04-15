<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    function pos_dashboard(){

        return view('backend.pos_dashboard');

    }


    function user_logout(Request $request){
        $request->session()->flush();

        return redirect('/');

    }




}
