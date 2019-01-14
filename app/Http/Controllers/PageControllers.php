<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Page;
use App\Note;

class PageControllers extends Controller
{

    public function show()
    {
    	$page = DB::table('pages')->get()->all();
    	return view('pages.page2', compact('page'));
    }

    

    public function onepage(Page $mypage)
    {
        return view('pages.page1', compact('mypage'));
    }


    public function store(Request $request)
    {
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


    public function delete(Page $id)
    {
        if(count($id->notes))
        {
            echo "there are data";
        }
        else{
            $id->delete();
            return back();

        }
        
    }


    public function addnote(Request $request, Page $mypage)
    {
        $this->validate($request,[
            'text' => 'required | min:3'
        ],
        [
            'text.required' => 'Somethings ..'
        ]
    );

        var_dump("hii");
        $all_notes = new Note;
        // $all_notes->page_id = $p_id;
        $all_notes->text = $request->text;
        // $all_notes->save();
        $mypage->notes()->save($all_notes);
        return back();
    }

    public function deletenote(Note $not_id)
    {
        var_dump($not_id);
        $not_id->delete();
        return back();
    }

    public function editNote(Note $not_id)
    {
        return view('editnote',compact('not_id'));

    }

    public function updateNote(Request $request,Note $not_id)
    {
        $not_id->update($request->all());
        return  redirect('page/'. $not_id->page_id);
    }

    
}
