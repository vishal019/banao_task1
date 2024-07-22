<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\http\middleware\alreadyLoggedIn;
use App\http\middleware\authCheck;






Route::get('/',[userController::class,'Display_login_page'])->middleware(alreadyLoggedIn::class);
Route::get('/user_register',[userController::class,'Display_register_page'])->middleware(alreadyLoggedIn::class);
Route::post('/user_registerted',[userController::class,'register_user']);
Route::post('/validate_login',[userController::class,'validate_app_user']);
Route::get('/dashboard',[userController::class,'display_dashboard'])->middleware('web',authCheck::class);
Route::get('/logout',[userController::class,'user_logout']);


