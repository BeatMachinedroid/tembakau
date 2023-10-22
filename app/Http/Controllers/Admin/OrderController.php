<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\pembayaran;
use App\Models\barang;

class OrderController extends Controller
{
    public function index(){
        $order = pembayaran::with('transaksi')->with('transaksi.barang')->paginate(10);
        return view('Admin.order', compact('order'));
    }


    public function edit(Request $request){
        $request->validate([
            'keterangan' => 'required',
        ]);

        $order = order::findOrFail($request->id);
        $order->keterangan = $request->keterangan;
        $order->save();

        return redirect()->route('view.order');
    }


}
