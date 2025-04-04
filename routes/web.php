<?php

use App\Http\Controllers\Chief\ChiefController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});



Route::get('/chiefs',[ChiefController::class,'index'] )->name('chiefs.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');


require __DIR__.'/auth.php';
