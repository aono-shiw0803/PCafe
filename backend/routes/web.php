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
  Route::get('/{user}', 'UserController@show')->name('show')->where('shop', '[0-9]+');
  Route::get('/{user}/edit', 'UserController@edit')->name('edit');
  Route::put('/{user}', 'UserController@update')->name('update');
  Route::post('/delete/{id}', 'UserController@delete')->name('delete');
});

// カフェページ
Route::group(['prefix' => 'shops', 'as' => 'shops.', 'middleware' => 'auth'], function(){
  Route::get('/{shop}', 'ShopController@show')->name('show')->where('shop', '[0-9]+');
  Route::get('/create', 'ShopController@create')->name('create');
  Route::post('/store', 'ShopController@store')->name('store');
  Route::get('/{shop}/edit', 'ShopController@edit')->name('edit');
  Route::put('/{shop}', 'ShopController@update')->name('update');
  Route::post('/delete/{id}', 'ShopController@delete')->name('delete');
});

// カフェページ（ジャンル別）
Route::group(['prefix' => 'shops'], function(){
  Route::get('/', 'ShopController@index')->name('shops.index');
  Route::get('/{tema}', 'ShopController@tema')->where('tema', 'wifi|station|fashionable|coffee|spot|liquor|hotel')->name('shops.tema');
  Route::get('/{area}', 'ShopController@area')->name('shops.area');
});

Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function(){
  // 入力ページ
  Route::get('/', 'ContactController@create')->name('create');
  // 確認ページ
  Route::post('/confirm', 'ContactController@confirm')->name('confirm');
  // DB挿入＆メール送信
  Route::post('/store', 'ContactController@store')->name('store');
  // 送信完了ページ
  Route::get('/complete', 'ContactController@complete')->name('complete');
});

// アルバム
Route::group(['prefix' => 'photos', 'as' => 'photos.'], function(){
  Route::get('/', 'PhotoController@index')->name('index');
  Route::post('/store', 'PhotoController@store')->name('store')->middleware('auth');
  Route::post('/delete/{id}', 'PhotoController@delete')->name('delete')->middleware('auth');
});
Route::get('/shops/{shop}/create', 'PhotoController@create')->where('shop', '[0-9]+')->name('photos.create')->middleware('auth');
Route::get('/photos/{photo}', 'PhotoController@show')->where('photo', '[0-9]+')->name('photos.show')->middleware('auth');

Auth::routes();
