<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Feed\FeedController;
use App\Http\Controllers\IzinKeluar\IzinKeluarController;
use App\Http\Controllers\Surat\SuratController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\izinbermalam\izinbemalamController;
use App\Http\Controllers\PembelianKaos\pembeliankaosController;
use App\Http\Controllers\Ruangan\RuanganController;
use App\Models\Surat;
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

Route::get('/feeds', [FeedController::class, 'index'])->middleware('auth:sanctum');
Route::post('/feed/store', [FeedController::class, 'store'])->middleware('auth:sanctum');
Route::post('/feed/like/{feed_id}', [FeedController::class, 'likePost'])->middleware('auth:sanctum');
Route::post('/feed/comment/{feed_id}', [FeedController::class, 'comment'])->middleware('auth:sanctum');
Route::get('/feed/comments/{feed_id}', [FeedController::class, 'getComments'])->middleware('auth:sanctum');

//izinKeluar
Route::get('/izins', [IzinKeluarController::class, 'index'])->middleware('auth:sanctum');
Route::post('/izin/store', [IzinKeluarController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/izin/delete/{id}', [IzinKeluarController::class, 'destroy'])->middleware('auth:sanctum');

//izinBermalam
Route::get('/ib', [izinbemalamController::class, 'index'])->middleware('auth:sanctum');
Route::post('/ib/store', [izinbemalamController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/ib/delete/{id}', [izinbemalamController::class, 'destroy'])->middleware('auth:sanctum');

//Booking Ruangan
Route::get('/bookings', [BookingController::class, 'index'])->middleware('auth:sanctum');
Route::post('/booking/store', [BookingController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/booking/delete/{id}', [BookingController::class, 'destroy'])->middleware('auth:sanctum');

//Ruangan
Route::get('/ruangans', [RuanganController::class, 'index'])->middleware('auth:sanctum');
Route::post('/ruangan/store', [RuanganController::class, 'store'])->middleware('auth:sanctum');
Route::get('/ruangan/{id}', [RuanganController::class, 'getById'])->middleware('auth:sanctum');


Route::get('/pembelianKaos',[pembeliankaosController::class,'index'])->middleware('auth:sanctum');
Route::post('/pembelianKaos/store',[pembeliankaosController::class,'store'])->middleware('auth:sanctum');
Route::delete('/pembelianKaos/delete/{id}',[pembeliankaosController::class,'destroy'])->middleware('auth:sanctum');
Route::patch('/pembelianKaos/update/{id}', [pembeliankaosController::class, 'update'])->middleware('auth:sanctum');



Route::get('/surats', [SuratController::class, 'index'])->middleware('auth:sanctum');
Route::post('/surat/store', [SuratController::class, 'store'])->middleware('auth:sanctum');
Route::get('/test', function () {
    return response([
        'message' => 'Api is working'
    ], 200);
});

Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);
Route::post('logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
