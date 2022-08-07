<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLogin'])->middleware('guest')->name('login');;

Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/', [CompanyController::class, 'index'])->middleware('auth');

Route::resource('companies', CompanyController::class)->middleware('auth');

Route::resource('employees', EmployeeController::class)->middleware('auth');
