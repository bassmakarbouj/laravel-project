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
     * @api {get} /home index
     * @apiGroup Home
     *
     * @apiSuccess (Success 200) return home view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(){
        return view('home');
    }


    
}
