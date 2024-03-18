<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Micro Service Boilerplate!'
    ]);
});

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
    Route::group(['prefix' => 'items'], function () {
        Route::get('/', 'ItemController@index');
        Route::get('/paginate', 'ItemController@paginatedItem');
        Route::post('/store', 'ItemController@store');
        Route::get('/show/{itemId}', 'ItemController@show');
        Route::patch('/update/{itemId}', 'ItemController@update');
        Route::delete('/delete/{itemId}', 'ItemController@delete');

        Route::group(['prefix' => 'stocks'], function () {
            Route::post('/store', 'StockController@store');
        });
    });

    Route::group(['prefix' => 'authors'], function () {
        Route::get('/', 'AuthorController@index');
        Route::post('/store', 'AuthorController@store');
        Route::patch('/update/{authorId}', 'AuthorController@update');
        Route::delete('/delete/{authorId}', 'AuthorController@delete');
        Route::get('/show/{authorId}', 'AuthorController@show');
        Route::get('/paginate', 'AuthorController@paginateAuthor');

        Route::group(['prefix' => 'books'], function () {
            Route::get('/', 'BookController@index');
            Route::get('/paginate', 'BookController@paginateBook');
            Route::post('/store', 'BookController@store');
            Route::delete('/delete/{bookId}', 'BookController@delete');
            Route::get('/show/{bookId}', 'BookController@show');
            Route::patch('/update/{bookId}', 'BookController@update');
        });
    });
});
