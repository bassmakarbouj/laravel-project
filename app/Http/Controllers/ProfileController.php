<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Auth;
use App\User;
use Post;

class ProfileController extends Controller
{

    // public function update(){
    //     updateProfile();
    // }


    public function profile()
    {
        $id = Auth::user();
        $i = $id;
        return $i;
    }


    public function updateProfile(UpdateProfileRequest $request, User $user_id)
    {
//        dd($request);
        $user_id->update($request->all());
        $user_id->save();
        // Post::where('id', $user_id)->update(Input::all());
        return $user_id;
    }
}
