<?php

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

Route::group(['namespace' => 'Post'], function () {
    route::get('/', 'IndexController')->name('post.index');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        route::get('/', 'IndexController')->name('admin.post.index');
//        route::get('/create', 'CreateController')->name('admin.post.create');
//        route::post('/', 'StoreController')->name('admin.post.store');
//        route::get('/{post}', 'ShowController')->name('admin.post.show');
//        route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
//        route::patch('/{post}', 'UpdateController')->name('admin.post.update');
//        route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        route::get('/', 'IndexController')->name('admin.category.index');
        route::post('/', 'StoreController')->name('admin.category.store');
        route::get('/{post}', 'ShowController')->name('admin.category.show');
        route::patch('/{post}', 'UpdateController')->name('admin.category.update');
        route::delete('/{post}', 'DestroyController')->name('admin.category.destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
