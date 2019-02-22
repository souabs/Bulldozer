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

Route::get('lang/{locale}', function ($locale) {

    App::setLocale($locale);
     return view('links.change');
    });


Auth::routes();
Route::get('/', 'HomeController@index');
//Route::get('/lang/{locale}', 'HomeController@lang');
Route::get('/links/redirect/{code}', 'LinkController@redirect');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/links', 'LinkController');
