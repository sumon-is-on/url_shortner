<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UrlController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\UserController;


Route::get('/',[UrlController::class,'create'])->name('url.create');
#authLogin
Route::get('/login',[AuthController::class,'login'])->name('user.login');
Route::post('/login_post',[AuthController::class,'loginPost'])->name('user.login.post');

Route::middleware(['auth'])->group(function () {
    #logout
    Route::get('/logout',[AuthController::class,'logout'])->name('user.logout');

    #Registration
    Route::get('/registration',[AuthController::class,'registration'])->name('user.registration');
    Route::post('/registration',[AuthController::class,'registrationPost'])->name('user.registration.post');


    #user
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    // Route::get('/profile_edit',[UserController::class,'profile'])->name('user.profile');

    Route::post('/store',[UrlController::class,'store'])->name('url.submit');
    Route::get('/{pathParamter}',[UrlController::class, 'pathParamter'])->name('url.pathParamter');

});

