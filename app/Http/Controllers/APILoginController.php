<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class APILoginController extends Controller
{
    /**
     * @api {post} user/login login
     * @apiGroup Login
     * @apiParam {object} request  object array of login input values
     *
     * @apiSuccess(Success 200) token login successfuly
     *
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        $email = $request->email;
        $user = DB::table('users')->where('email',$email)->pluck('statue')->toArray();
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if($user[0] ==1){
            $credentials = $request->only('email', 'password');
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            return response()->json(compact('token'));
        }
        else{
            return "your account is disable";
        }
    }
}
