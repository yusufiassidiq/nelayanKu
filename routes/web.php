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
    if(!Auth::check()){
		return redirect('/login');
	 }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tambah_nelayan','HomeController@tambahNelayanPage')->name('tambahNelayanPage');
Route::post('/storeNelayan','HomeController@storeNelayan')->name('storeNelayan');
Route::get('/tambah_data','HomeController@tambahDataPage')->name('tambahDataPage');
Route::post('/storeData','HomeController@storeData')->name('storeData');
Route::get('/list_data','HomeController@listDataPage')->name('listDataPage');
Route::get('/data/export_excel', 'HomeController@export_excel')->name('exportData');

Route::get('test', 'TestController@index');