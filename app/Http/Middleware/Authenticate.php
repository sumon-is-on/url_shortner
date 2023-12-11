<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    protected function redirectTo($request){
        if (! $request->expectsJson()) {
            Toastr::warning('Please Login First');
            return route('user.login');
        }
    }
}
