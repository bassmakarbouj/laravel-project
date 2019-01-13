<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Page;

class PageControllers extends Controller
{

    public function show()
    {
    	$page = DB::table('pages')->get()->all();
    	return view('pages.page2', compact('page'));
    }

    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        $page->save();
        return back();
    }

    public function delete(Page $id)
    {
        echo"d";
        $id->delete();
        return back();
    }

    
}
