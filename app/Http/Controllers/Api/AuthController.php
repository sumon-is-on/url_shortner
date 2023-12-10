<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){

        # request validation
        $validation = Validator::make($request->all(),[
            'email'     =>  'required',
            'password'  =>  'required'
        ]);
        # error message on validation fails
        if($validation->fails()){
            return response()->json([
                'message'   =>  'Validation error',
                'errors'    =>  $validation->errors()
            ],422);
        }

        # checking credentials only email and password
        $credentials = $request->only('email','password');
        # if not authenticated
        if(! Auth::attempt($credentials)){
            return response()->json([
                'message'=>'Unauthinticated',
            ], 401);
        }else{
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'message'   =>  'Log in successfull',
                'data'      =>  $user,
                # creating user token
                'token'     =>  $user->createToken('API Token')->plainTextToken,
            ], 200);
        }
    }


    # Logout
    public function logout(){
        if(Auth::user()){
            Auth::user()->currentAccessToken()->delete();
            return response()->json([
                'message' => 'Logged Out Successfull'
            ],200);
        }else{
            return response()->json([
                'message' => 'User not logged in',
            ],500);
        }
    }
}
