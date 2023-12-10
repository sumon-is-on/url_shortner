<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExceptionHandlingMiddleware
{
    public function handle(Request $request, Closure $next): Response{
        try{
            return $next($request);
        }catch(\Throwable $th){
            return response()->json([
                'status'=>'error',
                'message'=>$th->getMessage()
            ]);
        }
    }
}
