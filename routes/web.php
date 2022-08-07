<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLogin'])->middleware('guest')->name('login');;

Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/', function () {return view('index');})->middleware('auth');
