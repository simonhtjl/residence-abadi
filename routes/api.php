<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthAPIController;

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

Route::post('/loginapi', [App\Http\Controllers\AuthController::class, 'loginapi']);
Route::post('/registerapi', [App\Http\Controllers\AuthAPIController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/pengaduanapi','\App\Http\Controllers\PendudukController@pengaduanapi');
    Route::get('/iuranapi','\App\Http\Controllers\PendudukController@iuranapi');
    Route::post('/iuranapi/upload/{id}','\App\Http\Controllers\PendudukController@uploadapi');
    Route::post('/pengaduanapi/tambahpengaduan','\App\Http\Controllers\PendudukController@tambahpengaduanapi');
    Route::get('/iuranapi/history','\App\Http\Controllers\PendudukController@history');
    // API route for logout user
    Route::post('/logoutapi', [App\Http\Controllers\AuthController::class, 'logoutapi']);

    //IoT
    Route::get('/controliotapi','\App\Http\Controllers\IotController@controlIotApi');
    Route::get('/controliotapi/{id}','\App\Http\Controllers\IotController@powerIotApi');
    Route::get('/jadwaliotapi','\App\Http\Controllers\IotController@jadwalIotApi');
    Route::post('/jadwaliotapi/tambahjadwal','\App\Http\Controllers\IotController@tambahJadwalIotApi');     
    Route::get('/jadwaliotapi/hapusjadwal/{id}','\App\Http\Controllers\IotController@hapusJadwalIotApi');
});




 

