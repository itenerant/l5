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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('file', 'FileUploadController@index')->name('file.form');
Route::post('upload', 'FileUploadController@upload')->name('file.upload');

Route::get('customers/data', 'CustomerController@getData')->name('customers.data');
Route::resource('customers', 'CustomerController');