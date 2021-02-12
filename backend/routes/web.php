<?php

use Illuminate\Support\Facades\Route;

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

// トップページ（誰でも閲覧可）
Route::get('/', 'TopController@index')->name('tops.index');

// ユーザーページ
Route::group(['prefix' => 'users', 'as' => 'users.', 'middleware' => 'auth'], function(){
  Route::get('/', 'UserController@index')->name('index');
  Route::get('/{user}', 'UserController@show')->name('show');
});

// カフェページ
Route::group(['prefix' => 'shops', 'as' => 'shops.', 'middleware' => 'auth'], function(){
  Route::get('/', 'ShopController@index')->name('index');
  Route::get('/{shop}', 'ShopController@show')->name('show');
  Route::get('/create', 'ShopController@create')->name('create');
  Route::post('/store', 'ShopController@store')->name('store');
  Route::get('/{shop}/edit', 'ShopController@edit')->name('edit');
  Route::put('/{shop}', 'ShopController@update')->name('update');
  Route::post('/delete/{id}', 'ShopController@delete')->name('delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
