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
  Route::get('/{user}/favorite', 'UserController@favorite')->name('favorite')->where('user', '[0-9]+');
  Route::get('/{user}', 'UserController@show')->name('show')->where('user', '[0-9]+');
  Route::get('/{user}/edit', 'UserController@edit')->name('edit')->where('user', '[0-9]+');
  Route::put('/{user}', 'UserController@update')->name('update')->where('user', '[0-9]+');
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
  Route::get('/like/{id}', 'ShopController@like')->name('like')->where('id', '[0-9]+');
  Route::get('/unlike/{id}', 'ShopController@unlike')->name('unlike')->where('id', '[0-9]+');
});
Route::get('/shops/ranking', 'ShopController@ranking')->name('shops.ranking');

// カフェページ（ジャンル別）
Route::group(['prefix' => 'shops'], function(){
  Route::get('/', 'ShopController@index')->name('shops.index');
  Route::get('/created_at', 'ShopController@createdAt')->name('shops.createdAt');
  Route::get('/updated_at', 'ShopController@updatedAt')->name('shops.updatedAt');
  Route::get('/{tema}', 'ShopController@tema')->where('tema', 'wifi|station|fashionable|coffee|spot|liquor|hotel')->name('shops.tema');
  Route::get('/{area}', 'ShopController@area')->name('shops.area');
});
// ajax
// Route::post('ajaxlike', 'ShopController@ajaxlike')->name('shops.ajaxlike')->middleware('auth');

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

// 口コミ
Route::group(['prefix' => 'shops', 'as' => 'comments.', 'middleware' => 'auth'], function(){
  Route::get('/{shop}/comments/create', 'CommentController@create')->name('create')->where('shop', '[0-9]+');
  Route::post('/{shop}/comments/store', 'CommentController@store')->name('store')->where('shop', '[0-9]+');
  Route::post('/{shop}/comments/delete/{id}', 'CommentController@delete')->name('delete')->where('shop', '[0-9]+');
});

Auth::routes();
