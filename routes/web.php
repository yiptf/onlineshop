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


Route::get('/shop/products', 'App\Http\Controllers\ShopController@index')->name('home');
Route::get('/shop/products/create', 'App\Http\Controllers\ShopController@create')->middleware('admin');
Route::post('/shop/products', 'App\Http\Controllers\ShopController@store')->middleware('admin');
Route::get('/shop/products/{product}', 'App\Http\Controllers\ShopController@show');
Route::get('/shop/products/{product}/edit', 'App\Http\Controllers\ShopController@edit')->middleware('admin');
Route::put('/shop/products/{product}', 'App\Http\Controllers\ShopController@update')->middleware('admin');
Route::delete('/shop/products/{product}', 'App\Http\Controllers\ShopController@destroy')->middleware('admin');

Route::post('/shop/{product}/add', 'App\Http\Controllers\CartController@addToCart')->middleware('auth');
Route::get('/shop/cart', 'App\Http\Controllers\CartController@showCart')->middleware('auth');
Route::delete('/shop/{product}/remove', 'App\Http\Controllers\CartController@removeFromCart')->middleware('auth');

Auth::routes();


