<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\transaksi;
use Illuminate\Support\Str;

class PelangganController extends Controller
{
    public function index(){
        $barang = barang::all();
        return view('pelanggan.index', compact('barang'));
    }

    public function buy(Request $request){
        $request->validate([
            'id' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $orderId = 'order'.'-'.substr(uniqid(), 5, 13);

        $cart = new transaksi;
        $cart->code_order = $orderId;
        $cart->barang_id = $request->id;
        $cart->jumlah = $request->jumlah;
        $cart->nama_pembeli = $request->nama;
        $cart->alamat = $request->alamat;
        $cart->save();

        // return $request;
        return redirect()->route('view.pelanggan');
    }

    // public function search_pembayaran(Request $request){
    //     $request->validate([
    //         'code_order' => 'required',
    //         'nama' => 'required',
    //     ]);


    // }


}
