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
Route::get('/', 'GeneralController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('band/register', 'Admin\AppController@add');
  Route::post('band/register', 'Admin\AppController@register');
  Route::get('band', 'Admin\AppController@index');
  Route::get('band/edit', 'Admin\AppController@edit');
  Route::post('band/edit', 'Admin\AppController@update');
  Route::get('band/delete', 'Admin\AppController@delete');
});

// いいねをつける
Route::get('/home/like/{id}', 'Admin\LikeController@exeOther_outfitLike')->name('like_home');
// いいねを消す
Route::get('/home/nolike/{id}', 'Admin\LikeController@exeOther_outfitNoLike')->name('nolike_home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
