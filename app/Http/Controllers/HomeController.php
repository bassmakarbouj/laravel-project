<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(){
        return view('home');
    }

    public function profile(){
        $id = DB::table('users')->get();
        $i = $id[0];
        // print_r($i);
        
        return view('profile',compact('i'));
    }

    
}
