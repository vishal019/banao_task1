<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskController;
use App\http\middleware\apiAuth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware('web',apiAuth::class)->group(function () {
    Route::post('/todo/tasks', [TaskController::class, 'addTask']);
    Route::post('/todo/status', [TaskController::class, 'updateTaskStatus']);
    Route::post('/todo/delete',[TaskController::class,'detele_task']);
    Route::get('/todo/tasks', [TaskController::class,'display_task']);
    Route::post('/todo/tasks/{task}/mark_done', [TaskController::class,'markDone']);
    Route::post('/todo/tasks/{task}/mark_pending', [TaskController::class,'markPending']);



});