<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UrlController;
use App\Http\Controllers\Web\AuthController;


#authLogin
Route::get('login',[AuthController::class,'login'])->name('user.login');
Route::post('login_post',[AuthController::class,'loginPost'])->name('user.login.post');
Route::get('logout',[AuthController::class,'logout'])->name('user.logout');

#Registration
Route::get('registration',[AuthController::class,'registration'])->name('user.registration');
Route::post('registration',[AuthController::class,'registrationPost'])->name('user.registration.post');


Route::get('/',[UrlController::class,'create'])->name('url.create');
Route::post('/store',[UrlController::class,'store'])->name('url.submit');

