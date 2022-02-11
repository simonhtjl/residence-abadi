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

Route::get('/','\App\Http\Controllers\AuthController@login')->name('login');
Route::post('/actionlogin','\App\Http\Controllers\AuthController@actionlogin')->name('actionlogin');
Route::get('/actionlogout','\App\Http\Controllers\AuthController@actionlogout');

Route::get('/lupapassword','\App\Http\Controllers\AuthController@lupapassword');
Route::post('/lupapassword/validasiemail','\App\Http\Controllers\AuthController@validasiemail');
Route::get('/gantipassword/{id}','\App\Http\Controllers\AuthController@gantipassword');
Route::post('/ubahpassword/{id}','\App\Http\Controllers\AuthController@ubahpassword');
Route::get('/gantipassword','\App\Http\Controllers\AuthController@lupas');




Route::group(['middleware' => ['admin']], function () {
    //Admin
    Route::get('/useradmin','\App\Http\Controllers\AdminController@indexAdmin');
    Route::get('/userpenduduk','\App\Http\Controllers\AdminController@index');
    Route::get('/daftarrumah','\App\Http\Controllers\AdminController@indexRumah');

    //IuranAdmin
    Route::get('/daftariuran','\App\Http\Controllers\AdminController@indexIuran');
    Route::post('/daftariuran/tambahiuran','\App\Http\Controllers\AdminController@tambahIuran');
    Route::post('/daftariuran/editiuran/{id}','\App\Http\Controllers\AdminController@editIuran');
    Route::get('/daftariuran/hapusiuran/{id}','\App\Http\Controllers\AdminController@hapusIuran');
    Route::get('/daftariuran/buktipembayaran/{id}','\App\Http\Controllers\AdminController@tampilPembayaran');



    //PengaduanAdmin
    Route::get('/daftarpengaduan','\App\Http\Controllers\AdminController@indexPengaduan');
    Route::get('/daftarpengaduan/ubahstatus/{id}','\App\Http\Controllers\AdminController@ubahStatus');

    //Rumah
    Route::post('/admin/tambahrumah','\App\Http\Controllers\AdminController@tambahRumah');
    Route::get('/admin/hapusrumah/{id}','\App\Http\Controllers\AdminController@hapusRumah');
    Route::post('/admin/editrumah/{id}','\App\Http\Controllers\AdminController@editRumah');

    //User Penduduk
    Route::post('/admin/tambahuser','\App\Http\Controllers\AdminController@tambahUser');
    Route::get('/admin/hapususer/{id}','\App\Http\Controllers\AdminController@hapusUser');

    //User Admin
    Route::post('/admin/tambahadmin','\App\Http\Controllers\AdminController@tambahAdmin');

  });

  Route::group(['middleware' => ['pemilikrumah']], function () {
      //dashboard penduduk
        Route::get('/dashboard','\App\Http\Controllers\PendudukController@index');
        Route::get('/pengaduan','\App\Http\Controllers\PendudukController@indexPengaduan');
        Route::get('/iuran','\App\Http\Controllers\PendudukController@indexIuran');
        Route::post('/iuran/upload/{id}','\App\Http\Controllers\PendudukController@upload');

        Route::post('/pengaduan/tambahpengaduan','\App\Http\Controllers\PendudukController@tambahPengaduan');
  });




