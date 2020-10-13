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

// Frontend
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/product', 'PagesController@product');
Route::get('/category', 'PagesController@category');
Route::get('/category/{category}', 'PagesController@categoryDetail');
Route::get('/product/{id}', 'PagesController@productDetail');
Route::post('/product/cart/{id}', 'PagesController@addCart')->middleware('auth');
Route::post('/cart/delete/{id}', 'PagesController@deleteCart')->middleware('auth');
Route::get('/cart', 'PagesController@cart')->middleware('auth');
Route::get('/checkout', 'PagesController@checkout')->middleware('auth');
Route::post('/checkout/finish', 'PagesController@checkoutFinish')->middleware('auth');
Route::get('/finish', 'PagesController@finish')->middleware('auth');
Route::get('/account', 'PagesController@account')->middleware('auth');
Route::get('/account/edit', 'PagesController@editAccount')->middleware('auth');
Route::post('/account/update', 'PagesController@updateAccount')->middleware('auth');
Route::post('/account/picture/update', 'PagesController@updatePictureAccount')->middleware('auth');
Route::get('/history', 'PagesController@history')->middleware('auth');
Route::get('/history/detail/{id}', 'PagesController@historyDetail')->middleware('auth');
Route::get('/history/detail/print/{id}', 'PagesController@print')->middleware('auth');

// Backend
Route::get('/backend', 'PagesController@dashboard')->middleware('auth:admin');
Route::get('/backend/purchase', 'PurchaseController@index')->middleware('auth:admin');
Route::resource('/backend/purchase', 'PurchaseController')->middleware('auth:admin');
Route::resource('/backend/product', 'ProductController')->middleware('auth:admin');
Route::resource('/backend/category', 'CategoryController')->middleware('auth:admin');
Route::resource('/backend/size', 'SizeController')->middleware('auth:admin');

Route::get('/backend/product/update','ProductController@update');
Route::get('/backend/category/update','CategoryController@update');
Route::get('/backend/size/update','SizeController@update');

Route::get('/backend/product/delete','ProductController@destroy');
Route::get('/backend/category/delete','CategoryController@destroy');
Route::get('/backend/size/delete','SizeController@destroy');

Auth::routes();
Route::get('/backend/login', 'LoginController@index');
Route::post('/backend/login/process', 'LoginController@Process');
Route::get('/home', 'PagesController@index');
