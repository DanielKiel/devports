<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api', 'isConfirmed'])->get('/user', function (Request $request) {
    return $request->user();
});

// --------------- News Stream

Route::middleware(['auth:api', 'isConfirmed'])->namespace('API')->group(function() {
    Route::get('/news/all', 'NewsController@all')
        ->name('api.news.all');

    Route::post('/news', 'NewsController@store')
        ->name('api.news.store');

    Route::put('/news/{news}', 'NewsController@update')
        ->name('api.news.update');

    Route::delete('/news/{news}', 'NewsController@destroy')
        ->name('api.news.delete');

    Route::post('/news/comment/{news}', 'NewsController@comment')
        ->name('api.news.comment.store');
});

Route::get('/news', 'API\\NewsController@index')
    ->name('api.news.get');

Route::get('/news/{news}', 'API\\NewsController@show')
    ->name('api.news.show');
