<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UrlController;
use App\Http\Controllers\Api\AuthController;


# Authentication(Login)
Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function(){
    # Authentication(LogOut)
    Route::get('/logout',[AuthController::class,'logout']);

    # Url
    Route::resource('url', UrlController::class);
    Route::get('/{pathParamter}',[UrlController::class, 'pathParamter'])->name('url.pathParamter');

});
