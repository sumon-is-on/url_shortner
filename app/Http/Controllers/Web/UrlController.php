<?php

namespace App\Http\Controllers\Web;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{
    public function create()
    {
        return view('web');
    }
    public function pathParamter($pathParamter)
    {
        $url = Url::where('short_url', $pathParamter)->firstOrFail();
        if ($url) {
            $url->update([
                'click_count' => $url->click_count + 1,
            ]);
            return redirect()->to($url->original_url);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'url'       =>  'required|url'
        ]);

        $url = $request->input('url');
        $shortUrl = generateShortUrl();

        $url = Url::create([
            'original_url'  => $url,
            'short_url'     => $shortUrl,
            'user_id'       => Auth::user()->id,
        ]);
        Toastr::success('Short url Has been generated Successfully');
        return redirect()->route('user.profile');

    }
}
