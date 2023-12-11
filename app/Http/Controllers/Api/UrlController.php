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

        $url = Url::create([
            'original_url'  => $url,
            'short_url'     => $shortUrl,
            'user_id'       => Auth::user()->id,
        ]);

        return $this->ResponseWithSuccess($url, 'Your url is set to short');
    }

    public function pathParamter($pathParamter){
        $url = Url::where('short_url', $pathParamter)->firstOrFail();
        if ($url) {
            $url->update([
                'click_count' => $url->click_count + 1,
            ]);
            return redirect()->to($url->original_url);
        }
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
