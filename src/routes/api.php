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
});
