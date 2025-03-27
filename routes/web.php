<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/login',[LoginController::class, 'create'])->name('login');
