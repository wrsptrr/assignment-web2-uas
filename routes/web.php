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

// Public
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

// Dashboard
Route::get('/dashboard', 'PagesController@dashboard')->middleware('auth:admin');
Route::get('/dashboard/purchase', 'PurchaseController@index')->middleware('auth:admin');
Route::resource('/dashboard/purchase', 'PurchaseController')->middleware('auth:admin');
Route::resource('/dashboard/product', 'ProductController')->middleware('auth:admin');
Route::resource('/dashboard/category', 'CategoryController')->middleware('auth:admin');
Route::resource('/dashboard/size', 'SizeController')->middleware('auth:admin');

Route::get('/dashboard/product/update','ProductController@update');
Route::get('/dashboard/category/update','CategoryController@update');
Route::get('/dashboard/size/update','SizeController@update');

Route::get('/dashboard/product/delete','ProductController@destroy');
Route::get('/dashboard/category/delete','CategoryController@destroy');
Route::get('/dashboard/size/delete','SizeController@destroy');

Auth::routes();
Route::get('/dashboard/login', 'LoginController@index');
Route::post('/dashboard/login/process', 'LoginController@Process');
Route::get('/home', 'PagesController@index');
