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
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('app/register', 'Admin\AppController@add');
  Route::post('app/register', 'Admin\AppController@register');
  Route::get('app', 'Admin\AppController@index');
  Route::get('app/edit', 'Admin\AppController@edit');
  Route::post('app/edit', 'Admin\AppController@update');
  Route::get('app/delete', 'Admin\AppController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
