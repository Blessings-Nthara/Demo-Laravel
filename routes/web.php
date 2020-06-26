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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products','ProductController@index');
Route::get('/products/create','ProductController@createGet')->middleware('auth');
ROUTE::post('/products/create','ProductController@createPost')->middleware('auth');
ROUTE::delete('/products/{id}','ProductController@destroy')->middleware('auth');
ROUTE::get('/products/edit/{id}','ProductController@editGet')->middleware('auth');
ROUTE::post('/products/edit/{id}','ProductController@editPost')->middleware('auth');
ROUTE::post('/products/sort','ProductController@sort')->middleware('auth');
ROUTE::post('/products/filter','ProductController@filterPrice')->middleware('auth');
ROUTE::get('/products/search','ProductController@search')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

