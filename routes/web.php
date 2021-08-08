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

// Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController')->name('admin.index');

    // Posts
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        route::get('/', 'IndexController')->name('admin.post.index');
        route::get('/create', 'CreateController')->name('admin.post.create');
        route::post('/', 'StoreController')->name('admin.post.store');
        route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });

    // Categories
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        route::get('/', 'IndexController')->name('admin.category.index');
        route::post('/', 'StoreController')->name('admin.category.store');
        route::get('/{category}', 'ShowController')->name('admin.category.show');
        route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });

    // Tags
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        route::get('/', 'IndexController')->name('admin.tag.index');
        route::post('/', 'StoreController')->name('admin.tag.store');
        route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
