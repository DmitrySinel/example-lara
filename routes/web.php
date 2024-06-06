<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Main')->name('main.')->group(function(){
    Route::get('/', 'IndexController@index')->name('index');
});

Route::prefix('posts')->namespace('App\Http\Controllers\Post')->name('post.')->group(function(){
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/{post}', 'ShowController@index')->name('show');

    Route::namespace('Comment')->prefix('{post}/comments')->name('comment.')->group(function(){
        Route::post('/', 'StoreController@index')->name('store');
    });
    Route::namespace('Like')->prefix('{post}/likes')->name('like.')->group(function(){
        Route::post('/', 'StoreController@index')->name('store');
    });
});

Route::prefix('categories')->namespace('App\Http\Controllers\Category')->name('category.')->group(function(){
    Route::get('/', 'IndexController@index')->name('index');

    Route::namespace('Post')->prefix('{category}/posts')->name('post.')->group(function(){
        Route::get('/', 'IndexController@index')->name('index');
    });
});

Route::prefix('personal')->namespace('App\Http\Controllers\Personal')->name('personal.')->middleware('auth', 'verified')->group(function(){
    Route::prefix('main')->namespace('Main')->name('main.')->group(function() {
        Route::get('/', 'IndexController@index')->name('index');
    });

    Route::prefix('liked')->namespace('Liked')->name('liked.')->group(function() {
        Route::get('/', 'IndexController@index')->name('index');
        Route::delete('/{post}', 'DeleteController@index')->name('delete');
        Route::get('/{post}', 'ShowController@index')->name('show');
    });

    Route::prefix('comment')->namespace('Comment')->name('comment.')->group(function() {
        Route::get('/', 'IndexController@index')->name('index');
        Route::delete('/{comment}', 'DeleteController@index')->name('delete');
        Route::patch('/{comment}', 'UpdateController@index')->name('update');
        Route::get('/{comment}/edit', 'EditController@index')->name('edit');
    });
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin.')->middleware('auth', 'admin', 'verified')->group(function () {

    Route::get('/', 'IndexController@index')->name('main.index');

    Route::prefix('categories')->namespace('Category')->name('category.')->group(function(){
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/create', 'CreateController@index')->name('create');
        Route::post('/', 'StoreController@index')->name('store');
        Route::get('/{category}', 'ShowController@index')->name('show');
        Route::get('/{category}/edit', 'EditController@index')->name('edit');
        Route::patch('/{category}', 'UpdateController@index')->name('update');
        Route::delete('/{category}', 'DeleteController@index')->name('delete');
    });

    Route::prefix('tags')->namespace('Tag')->name('tag.')->group(function(){
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/create', 'CreateController@index')->name('create');
        Route::post('/', 'StoreController@index')->name('store');
        Route::get('/{tag}', 'ShowController@index')->name('show');
        Route::get('/{tag}/edit', 'EditController@index')->name('edit');
        Route::patch('/{tag}', 'UpdateController@index')->name('update');
        Route::delete('/{tag}', 'DeleteController@index')->name('delete');
    });

    Route::prefix('posts')->namespace('Post')->name('post.')->group(function(){
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/create', 'CreateController@index')->name('create');
        Route::post('/', 'StoreController@index')->name('store');
        Route::get('/{post}', 'ShowController@index')->name('show');
        Route::get('/{post}/edit', 'EditController@index')->name('edit');
        Route::patch('/{post}', 'UpdateController@index')->name('update');
        Route::delete('/{post}', 'DeleteController@index')->name('delete');
    });

    Route::prefix('users')->namespace('User')->name('user.')->group(function(){
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/create', 'CreateController@index')->name('create');
        Route::post('/', 'StoreController@index')->name('store');
        Route::get('/{user}', 'ShowController@index')->name('show');
        Route::get('/{user}/edit', 'EditController@index')->name('edit');
        Route::patch('/{user}', 'UpdateController@index')->name('update');
        Route::delete('/{user}', 'DeleteController@index')->name('delete');
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
