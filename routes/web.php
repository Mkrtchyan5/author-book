<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\HomeController;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', ['App\Http\Controllers\Auth\LoginController', 'showLoginForm']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('authors')->name('authors.')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('index');
        Route::get('/create', [AuthorController::class, 'create'])->name('create');
        Route::post('/store', [AuthorController::class, 'store'])->name('store');
        Route::get('/edit/{author}', [AuthorController::class, 'edit'])->name('edit');
        Route::post('/update', [AuthorController::class, 'update'])->name('update');
        Route::post('/delete', [AuthorController::class, 'delete'])->name('delete');
        Route::get('/view/{author}', [AuthorController::class, 'view'])->name("view");
    });

    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::get('/create', [BookController::class, 'create'])->name('create');
        Route::post('/store', [BookController::class, 'store'])->name('store');
        Route::get('/edit/{book}', [BookController::class, 'edit'])->name('edit');
        Route::post('/update', [BookController::class, 'update'])->name('update');
        Route::post('/delete', [BookController::class, 'delete'])->name('delete');
        Route::get('/view/{book}', [BookController::class, 'view'])->name("view");


    });

});
