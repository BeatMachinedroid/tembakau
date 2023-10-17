<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\pembayaran;
use App\Models\transaksi;
use Carbon\Carbon;

class DashboardControllers extends Controller
{
    public function index()
    {
        $barang = barang::where('stock', '=', 0)->count();
        $transaksi = pembayaran::where('tgl_bayar' ,Carbon::now()->format('Y-m-d'))->where('keterangan', '=', 'sukses')->sum('total_bayar');
        $barangkeluar = transaksi::with('barang')->whereHas('barang', function ($query) {
        $query->where('category', 'not like', '%tembakau%');
        })
        ->where('jumlah', '>', 0) // misalnya, jika ingin memfilter jumlah yang lebih besar dari 0
        ->count();
        $tembakau = transaksi::with('barang')->whereHas('barang', function ($query) {
            $query->where('category', 'like', '%tembakau%');
            })
            ->where('jumlah', '>', 0) // misalnya, jika ingin memfilter jumlah yang lebih besar dari 0
            ->count();
        return view('Admin.dashboard', compact('barang','transaksi','barangkeluar','tembakau'));
    }
}
