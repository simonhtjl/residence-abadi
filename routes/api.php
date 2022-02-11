<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/pengaduanapi','\App\Http\Controllers\PendudukController@pengaduanapi');
Route::get('/iuranapi','\App\Http\Controllers\PendudukController@iuranapi');
Route::post('/iuranapi/upload/{id}','\App\Http\Controllers\PendudukController@uploadapi');
Route::post('/pengaduanapi/tambahpengaduan','\App\Http\Controllers\PendudukController@tambahpengaduanapi');
 

