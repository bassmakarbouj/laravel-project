<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use DB; 

class ControlController extends Controller
{
    public function control(){
        if((Auth::user()) && (Auth::user()->role==3)){
            return redirect('/');
        }
        return view('control');
    }
}
