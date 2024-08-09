<?php

use App\Http\Controllers\Api\V1\TaskControllerApi;
use App\Http\Controllers\Api\V1\UserControllerApi;
use App\Http\Controllers\ChangeStausController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[DashboardController::class,'showAvailableTasks'])->name('dashboard')->middleware('auth');
Route::view('/dashboard','index');
Route::view('/signup', 'signup')->middleware('guest');

Route::get('/logout', [SessionController::class,'destroy_session']);



Route::post('/session/create', [SessionController::class,'create_session'])->middleware('guest');
Route::post('/session/destroy', [SessionController::class,'destroy_session'])->middleware('auth');


Route::get('/all_users',[UserController::class,'index'])->middleware(['can:isAdmin']);

Route::delete('/users/{user}',[UserController::class,'destroy'])->middleware('can:isAdmin');
Route::patch('/users/{id}',[UserController::class,'update'])->middleware('can:isAdmin');

Route::get('users/{user_id}/edit',[UserController::class,'edit'])->middleware('can:isAdmin');
Route::get('/users/create',[UserController::class,'create']);

Route::resource('tasks', TaskController::class);
Route::get('users/{user_id}/tasks',[UserController::class,'showUserTask'])->middleware('auth');

Route::get('/approvals',[ChangeStausController::class,'index']);

Route::get('changeStatus/{task}',[ChangeStausController::class,'create'])->middleware('can:isDeveloper');
Route::post('approveStatusChange/{task}',[ChangeStausController::class,'store'])->middleware('auth');
Route::get('delete_approval/{id}',[ChangeStausController::class,'destroy'])->middleware('can:isAdmin');

Route::post('grant_approval/{approval}',[TaskController::class,'grantTaskApproval'])->middleware('can:isAdmin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/get-csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});


