<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

// 'prefix' => 'admin' = admin/post
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});

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
