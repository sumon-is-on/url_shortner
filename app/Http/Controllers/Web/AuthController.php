<?php

namespace App\Http\Controllers\Web;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }


    public function loginPost(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if ($validation->fails()) {
            return redirect()->back();
        }
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('url.create');
        }
        else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('url.create');
    }



    public function registration(){
        $roles = Role::where('id','!=',1)->get();
        return view('registration',compact('roles'));
    }



    public function registrationPost(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'password'=>'required'
        ]);
        if ($validation->fails()) {
            return redirect()->back();
        }

        $filename=null;
        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
            $image->storeAs('/users',$filename);
        }
        User::create([
            'name'=>$request->name,
            'role_id'=>$request->role_id,
            'image'=>$filename,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
        ]);
        return to_route('user.login');
    }
}
