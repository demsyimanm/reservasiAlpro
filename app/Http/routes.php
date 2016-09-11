<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('admin','HomeController@login');
Route::post('admin',array('before' => 'csrf', 'uses' => 'HomeController@login'));
Route::get('logout','HomeController@logout');

/*------------- USER --------------*/
Route::get('user/pesan','UserController@reservasi');
Route::post('user/pesan','UserController@reservasi');
Route::get('user/pesan','UserController@reservasi');
Route::get('user/pesan_lain','UserController@reservasi_lain');
Route::post('user/pesan_lain','UserController@reservasi_lain');
Route::get('user/list_matkul','UserController@matkul');
Route::get('/','UserController@home');
Route::get('user/pilih','UserController@pilih_reservasi');
Route::get('user/calendar','UserController@calendar');


/*------------- ADMIN --------------*/
Route::group(['middleware' => 'auth'], function()
{
	/*---------------------matakuliah-------------------*/
	Route::get('admin/matkul','HomeController@matkul');
	Route::get('admin/tambah-matkul','HomeController@tambahMatkul');
	Route::post('admin/tambah-matkul','HomeController@tambahMatkul');
	Route::get('admin/delete-matkul/{id}','HomeController@deleteMatkul');
	Route::get('admin/update-matkul/{id}','HomeController@updateMatkul');
	Route::post('admin/update-matkul/{id}','HomeController@updateMatkul');
	
	/*---------------------admin-------------------*/
	Route::get('admin/admin','HomeController@administrator');
	Route::get('admin/tambah-admin','HomeController@tambahAdmin');
	Route::post('admin/tambah-admin','HomeController@tambahAdmin');
	Route::get('admin/delete-admin/{id}','HomeController@deleteAdmin');
	Route::get('admin/update-admin/{id}','HomeController@updateAdmin');
	Route::post('admin/update-admin/{id}','HomeController@updateAdmin');

	/*---------------------reservasi-------------------*/
	Route::get('admin/reservasi','HomeController@reservasi');
	Route::get('admin/delete-reservasi/{id}','HomeController@deleteReservasi');
	Route::get('admin/lihat-penyewaan/{id}','HomeController@prosesReservasi');
	Route::post('admin/lihat-penyewaan/{id}','HomeController@prosesReservasi');
	Route::get('admin/tolak-penyewaan/{id}','HomeController@tolakReservasi');
	Route::get('admin/calendar','HomeController@calendar');


	Route::get('admin/logout','HomeController@logout');
});
/*Route::get('/', function(){
	return view('admin/home');
});
*/