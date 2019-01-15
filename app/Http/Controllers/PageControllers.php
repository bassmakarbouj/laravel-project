<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Page;
use App\Note;

class PageControllers extends Controller
{

    public function show(){
    	$page = DB::table('pages')->get()->all();
    	return view('pages.page2', compact('page'));
    }

    

    public function onepage(Page $mypage){
        return view('pages.page1', compact('mypage'));
    }


    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required | min:3'
        ],
        [
            'title.required' => 'Somethings'
        ]
    );
        $page = new Page;
        $page->title = $request->title;
        $page->save();
        return back();
    }


    public function delete(Page $id){
        if(count($id->notes)){
            echo "there are data";
        }
        else{
            $id->delete();
            return back();

        }
        
    }


    

    
}
