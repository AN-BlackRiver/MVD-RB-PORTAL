<?php

use App\Http\Controllers\Chief\ChiefController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\File\FileController;
//use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {

    Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');

    Route::get('/', [NewsController::class, 'index'])->name('home');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

});

Route::get('/chiefs', [ChiefController::class, 'index'])->name('chiefs.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

/***
 *
 * DEV
 *
 */

Route::get('debug', function () {
    return auth()->user()->ovd->title;
});


Route::get('clear', function () {
    Cache::flush();
    return redirect()->back()->with('success', 'Кэш очищен');
})->name('clear');


//Роуты для админа
require __DIR__ . '/auth.php';
//Роуты для авторизации
require __DIR__ . '/admin.php';
