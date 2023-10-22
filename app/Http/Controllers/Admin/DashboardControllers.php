<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\pembayaran;
use App\Models\transaksi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class DashboardControllers extends Controller
{
    public function index()
    {
        $barang = barang::where('stock', '=', 0)->count();

        $transaksi = pembayaran::where('tgl_bayar' , Carbon::now()->format('Y-m-d'))->where('keterangan', '=', 'success')->sum('total_bayar');

        $barangkeluar = transaksi::with('barang')->whereHas('barang', function ($query) {
        $query->where('category', 'not like', '%tembakau%');
        })
        ->where('jumlah', '>', 0) // misalnya, jika ingin memfilter jumlah yang lebih besar dari 0
        ->count();

        $tembakau = pembayaran::with('transaksi')->whereHas('transaksi', function ($query) {
            $query->where('jumlah', '>', 0);
        })->whereHas('transaksi.barang', function ($query) {
            $query->where('category', 'like', '%tembakau%');
            })
            ->where('keterangan','=','success')
            // misalnya, jika ingin memfilter jumlah yang lebih besar dari 0
            ->count();

        return view('Admin.dashboard', compact('barang','transaksi','barangkeluar','tembakau'));
    }

    public function login(){
        return view('layout.login');
    }

    public function proses(Request $request)
    {
        Session::flash('nama',$request->nama);
        $request->validate([
            'nama'=>'required',
            'password'=>'required'
        ]);

        $data = [
            'nama' => $request->nama,
            'password' => $request->password
        ];

        if (Auth::Attempt($data)) {
            return redirect()->route('dashboard');
        }else{
            Session::flash('error','name and password is not valid');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

