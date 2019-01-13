<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageControllers extends Controller
{
    

    public function p1()
    {
    	return view('pages.page1');

    }


    public function show()
    {
    	$page = DB::table('pages')->get()->all();
    	return view('pages.page2', compact('page'));
    }
}
