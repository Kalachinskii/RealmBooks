<?php

use Illuminate\Support\Facades\Route;

// MAIN
Route::get('/', function () {
    return view('main');
})->name('home');

// USER
Route::group(['namespace' => 'App\Http\Controllers\User'], function () {
    // ограничить доступ - 404
    // добавить middleware
    Route::post('/register', action: 'RegisterController')->name('user.register');
    Route::post('/login', action: 'LoginController')->name('user.login');
    Route::get('/logout', action: 'LogoutController')->name('user.logout');
});

// ADMIN
// 'prefix' => 'admin' = admin/post
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});

// POST
// однометодные контроллеры (аналог ресурстного)
// Начиная с Laravel 8, пространство имен для контроллеров больше не подставляется автоматически. 
Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
});
