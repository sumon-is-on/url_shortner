<?php

namespace App\Http\Controllers\Web;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{
    public function create(){
        return view('web');
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(),[
            'url'       =>  'required|url'
        ]);
        if($validation->fails()){
            return redirect()->back();
        }

        $url = $request->input('url');
        $shortUrl = generateShortUrl();

        $url = Url::create([
            'original_url'  => $url,
            'short_url'     => $shortUrl,
            'user_id'       => Auth::user()->id,
        ]);

        return redirect()->back();

    }
}
