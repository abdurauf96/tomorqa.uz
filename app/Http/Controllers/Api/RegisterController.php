<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'  
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] =  $user->createToken('authToken')->accessToken;
        $success['name'] =  $user->name;
        return response()->json($success, 200);
    }

    public function login(Request $request)
    {
        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(auth()->attempt($data)){
            $token=auth()->user()->createToken('authToken')->accessToken;
            return response()->json($token, 200);
        }else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
