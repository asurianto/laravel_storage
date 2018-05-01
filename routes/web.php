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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','HomeController@index');
Route::get('add-file','HomeController@addFile')->name('add-file');
Route::get('download-file/{id}/{name}','HomeController@downloadFile')->name('download-file');
Route::get('delete-file/{id}/{name}','HomeController@deleteFile')->name('delete-file');
Route::post('save-file','HomeController@saveFile')->name('save-file');
Auth::routes();
