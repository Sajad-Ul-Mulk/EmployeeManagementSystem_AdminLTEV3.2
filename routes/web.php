<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/dashboard','dashboard');
Route::view('/signup', 'signup');
Route::view('/login', 'login');

Route::post('/register', RegistrationController::class);

Route::post('/session/create', [SessionController::class,'create_session']);

