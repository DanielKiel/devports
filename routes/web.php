<?php

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
})->name('root');

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/news', 'Frontend\NewsController@index')
    ->name('frontend.news.list');

Route::get('/news/{news}', 'Frontend\NewsController@show')
    ->name('frontend.news.show');

Auth::routes();

Route::get('/confirm/{decrypt}/{code}','Auth\RegisterController@confirm')
    ->name('registration.confirm');

Route::get('/home', 'HomeController@index')->name('home');

