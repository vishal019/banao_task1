<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Middleware\customMiddleware;
use App\Http\Middleware\customauthMiddleware;





Route::get('/',[userController::class,'Display_login_page'])->middleware(customMiddleware::class);
Route::get('/user_register',[userController::class,'Display_register_page']);
Route::post('/user_registerted',[userController::class,'register_user']);
Route::post('/validate_login',[userController::class,'validate_app_user']);
Route::get('/dashboard',[userController::class,'display_dashboard']);
Route::get('/logout',[userController::class,'user_logout']);
