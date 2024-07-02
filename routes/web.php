<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MalasngodingController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pegawai', [PegawaiController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pegawai/tambah', [PegawaiController::class, 'index']);
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
Route::post('/pegawai/store', [PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update', [PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{id}',[PegawaiController::class, 'hapus']);

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/cari',[PegawaiController::class, 'cari']);

Route::get('/input', [MalasngodingController::class, 'input']);
 
Route::post('/proses', [MalasngodingController::class, 'proses']);

Route::get('/karyawan', [KaryawanController::class, 'index']);

Route::get('/karyawan/cari',[KaryawanController::class, 'cari']);