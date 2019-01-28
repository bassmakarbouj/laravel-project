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
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

//        $user = User::first();
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
