<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Auth;

class APILoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('username', 'password');
        try {
            if (! $token = Auth::guard('api')->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }


    public function logout(Request $request)
    {
 
        try{
            $token = Auth::guard('api')->logout();
        }catch(Exception $e){
            return response()->json(['error'=>'error de seguridad'],500);
        }
        return response()->json(['exito'=>'logout exitoso'],200);


    }




    






}

