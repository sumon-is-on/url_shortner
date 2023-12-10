<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{

    public function index(){
        //
    }

    public function store(Request $request){

        $validation = Validator::make($request->all(),[
            'url'       =>  'required|url'
        ]);
        if($validation->fails()){
            return response()->json([
                'message'   =>  'Validation error',
                'errors'    =>  $validation->errors()
            ],422);
        }

        $url = $request->input('url');
        $shortUrl = generateShortUrl();

        Url::create([
            'original_url'  => $url,
            'short_url'     => $shortUrl,
            'user_id'       => Auth::user()->id,
        ]);
    }


    public function show(string $id){
        //
    }


    public function update(Request $request, string $id){
        //
    }

    public function destroy(string $id){
        //
    }
}
