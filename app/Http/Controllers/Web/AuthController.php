<?php

namespace App\Http\Controllers\Web;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }


    public function loginPost(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            Toastr::success('Logged In Successfully');
            return redirect()->route('url.create');
        }
        else{
            Toastr::warning('Invallid credentials');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        Toastr::warning('Logged Out Successfully');
        return redirect()->route('user.login');
    }



    public function registration(){
        $roles = Role::where('id','!=',1)->get();
        return view('registration',compact('roles'));
    }



    public function registrationPost(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email|email',
            'phone'=>'required|unique:users,phone|min:11',
            'image' => 'mimes:png,jpg',
            'password'=>'required|min:8'
        ]);

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
        Toastr::success('Registration Successfully. Please Log in ');
        return to_route('user.login');
    }
}
