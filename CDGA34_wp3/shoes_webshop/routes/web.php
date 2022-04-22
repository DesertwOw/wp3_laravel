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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');

    Route::get('/shoes/index','App\Http\Controllers\ShoeController@index')->name('index.listshoe');
    Route::post('/addcart/{id}','App\Http\Controllers\OrderController@addcart')->name('add_to_cart');

    Route::get('/datatravel','App\Http\Controllers\DatatravelController@index')->name('datatravel');
    Route::post('/uploadfile','App\Http\Controllers\DatatravelController@store');
    Route::get('/datatravel/show','App\Http\Controllers\DatatravelController@show')->name('datatravel.show');
    Route::post('/datatravel/download{file}','App\Http\Controllers\DatatravelController@download');
    Route::get('/datatravel/view/{is}','App\Http\Controllers\DatatravelController@view');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/shoes/addshoe','App\Http\Controllers\ShoeController@create')->name('create.addshoe');
    Route::post('/shoes/addshoe','App\Http\Controllers\ShoeController@store')->name('create.addshoe');
    Route::get('/shoes/index','App\Http\Controllers\ShoeController@index')->name('index.listshoe');
    Route::get('/shoes/edit/{id}','App\Http\Controllers\ShoeController@edit');
    Route::put('/shoes/edit/{id}','App\Http\Controllers\ShoeController@update');
    Route::delete('/shoes/delete/{id}','App\Http\Controllers\ShoeController@delete');


    Route::post('/addcart/{id}','App\Http\Controllers\OrderController@addcart')->name('add_to_cart');

    Route::get('/datatravel','App\Http\Controllers\DatatravelController@index')->name('datatravel');
    Route::post('/uploadfile','App\Http\Controllers\DatatravelController@store');
    Route::get('/datatravel/show','App\Http\Controllers\DatatravelController@show')->name('datatravel.show');
    Route::post('/datatravel/download{file}','App\Http\Controllers\DatatravelController@download');
    Route::get('/datatravel/view/{is}','App\Http\Controllers\DatatravelController@view');


    

    Route::get('/user/index','App\Http\Controllers\UserController@index')->name('index.listuser');
    Route::get('/user/adduser','App\Http\Controllers\UserController@create')->name('create.adduser');
    Route::post('/user/adduser','App\Http\Controllers\UserController@store')->name('create.adduser');
    Route::get('/user/edit/{id}','App\Http\Controllers\UserController@edit');
    Route::put('/user/edit/{id}','App\Http\Controllers\UserController@update');
    Route::delete('/user/delete/{id}','App\Http\Controllers\UserController@delete');
    
});
require __DIR__.'/auth.php';
