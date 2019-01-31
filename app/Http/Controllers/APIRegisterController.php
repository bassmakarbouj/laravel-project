<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;
use DB;

class APIRegisterController extends Controller
{
    /**
     * @api {post} user/register register
     * @apiGroup Register
     * @apiParam  {object} request  object array of register input values
     *
     * @apiSuccess (Success 200) token Register user with authorization
     * @apiSuccess (Success 200) response get all user info for register
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required',
            'photo'=> 'file'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
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
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'photo' =>$imagename,
        ]);
        $role = DB::table('roles')->where('name',"user")->get()->toArray();
        $user_id=$role[0]->id;
        $user->roles()->attach($user_id);
        $token = JWTAuth::fromUser($user);

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return Response::json(compact('token','response'));
    }
}
