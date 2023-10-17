<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardControllers;
use App\Http\Controllers\Admin\BarangController;

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


Route::get('/', [DashboardControllers::class, 'index'])->name('dashboard');

Route::get('barang', [BarangController::class, 'index'])->name('view.barang');
Route::post('tambah_barang', [BarangController::class, 'store'])->name('add.barang');
