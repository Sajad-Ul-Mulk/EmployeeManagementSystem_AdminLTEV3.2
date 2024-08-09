<?php

use App\Http\Controllers\Api\V1\TaskControllerApi;
use App\Http\Controllers\Api\V1\UserControllerApi;
use App\Http\Controllers\IsCompletedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function (){
    Route::apiResource('/users', UserControllerApi::class);
    Route::apiResource('/tasks', TaskControllerApi::class);
    Route::patch('tasks/{task}/complete', IsCompletedController::class);

    Route::post('login',[UserControllerApi::class,'login']);
    Route::post('logout/{user}',[UserControllerApi::class,'logout'])->middleware('auth:sanctum');

});




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

