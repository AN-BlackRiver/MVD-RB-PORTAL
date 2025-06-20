<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OVD\OVDController;
use App\Http\Controllers\Admin\Subdivision\SubdivisionController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Chief\ChiefController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    /***
     *Роуты для админа
     */
    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
        Route::post('/users', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/users/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/users/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

        Route::get('ovd', [OVDController::class, 'index'])->name('admin.ovd.index');
        Route::post('ovd', [OVDController::class, 'store'])->name('admin.ovd.store');
        Route::get('ovd/{ovd}', [OVDController::class, 'edit'])->name('admin.ovd.edit');
        Route::patch('ovd/{ovd}', [OVDController::class, 'update'])->name('admin.ovd.update');
        Route::delete('ovd/{ovd}', [OVDController::class, 'destroy'])->name('admin.ovd.destroy');

        Route::get('subdivisions', [SubdivisionController::class, 'index'])->name('admin.subdivision.index');
        Route::post('subdivisions', [SubdivisionController::class, 'store'])->name('admin.subdivision.store');
        Route::get('subdivisions/{subdivision}', [SubdivisionController::class, 'edit'])->name('admin.subdivision.edit');
        Route::patch('subdivisions/{subdivision}', [SubdivisionController::class, 'update'])->name('admin.subdivision.update');
        Route::delete('subdivisions/{subdivision}', [SubdivisionController::class, 'destroy'])->name('admin.subdivision.destroy');

        Route::view('/news', 'pages.admin.news.index')->name('admin.news.index');

        Route::view('/role', 'pages.admin.role.index')->name('admin.role.index');
    });
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

require __DIR__ . '/auth.php';
