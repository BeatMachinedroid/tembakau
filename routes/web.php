<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardControllers;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\PelangganController;

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

Route::get('admin/login', [DashboardControllers::class, 'login'])->name('login');
Route::get('logout', [DashboardControllers::class, 'logout'])->name('logout');
Route::post('proses/login', [DashboardControllers::class, 'proses'])->name('proses.login');

Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', [DashboardControllers::class, 'index'])->name('dashboard');
    Route::get('barang', [BarangController::class, 'index'])->name('view.barang');
    Route::post('tambah_barang', [BarangController::class, 'store'])->name('add.barang');
    Route::put('edit_barang', [BarangController::class, 'edit'])->name('edit.barang');
    Route::get('delete_barang/{id}', [BarangController::class,'delete'])->name('delete.barang');
    Route::get('search', [BarangController::class, 'search'])->name('search.barang');

    Route::get('supplier', [SupplierController::class, 'index'])->name('view.supplier');
    Route::post('tambah_supplier', [SupplierController::class, 'store'])->name('add.supplier');
    Route::put('edit_supplier', [SupplierController::class, 'edit'])->name('edit.supplier');
    Route::get('delete_supplier/{id}', [SupplierController::class, 'delete'])->name('delete.supplier');
    Route::get('search', [SupplierController::class, 'search'])->name('search.barang');

    Route::get('order', [OrderController::class, 'index'])->name('view.order');
    Route::put('edit_order', [OrderController::class, 'edit'])->name('edit.order');
});


Route::get('/', [PelangganController::class, 'index'])->name('view.pelanggan');
Route::post('proses_buy', [PelangganController::class, 'buy'])->name('buy.pelanggan');


