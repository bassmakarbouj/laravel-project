<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Auth;
use App\User;
use Post;

class ProfileController extends Controller
{
    /**
     * @api {get} /profile profile
     * @apiGroup Profile
     *
     * @apiSuccess (Success 200) id return logged in user info
     */
    public function profile(){
        $id = Auth::user();
        return $id;
    }


    /**
     * @api {post} update-my-profile/{user_id} updateProfile
     * @apiGroup Profile
     * @apiParam {object} request object array of logged in user profile updating info
     * @apiParam {object} user_id array contain user id & field to update
     *
     * @apiSuccess (Success 200) user_id updating profile info
     * @return User
     */
    public function updateProfile(UpdateProfileRequest $request, User $user_id){
        $user_id->update($request->all());
        if($request->hasFile('photo')){
            $allowedfileExtension = ['jpg', 'png'];
            $photo = $request->file('photo');
            $imagename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $checkimage = in_array($extension, $allowedfileExtension);
            if($checkimage){
                $i =$request->photo;
                $imagename = $i->store('photo');
            }
            $user_id->photo = $imagename;
        }
        $user_id->save();
        return $user_id;
    }
}
