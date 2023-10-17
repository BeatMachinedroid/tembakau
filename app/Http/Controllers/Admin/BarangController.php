<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\supplier;
use Carbon\Carbon;

class BarangController extends Controller
{
    public function index(){
        $barang = barang::with('supplier')->get();
        $supplier = supplier::all();
        return view('Admin.barang', compact('barang','supplier'));
    }

    public function store(Request $request){

        $request->validate([
            'nama_barang' => 'required',
            'category' => 'required',
            'images' => 'required|mimes:jpeg,png,jpg|max:20480',
            'harga' => 'required|numeric',
            'stock' => 'required',
            'supplier' => 'required|numeric',
        ]);

        if($request->has('images')) {
            $image = $request->file('images');
            $extension = $image->getClientOriginalExtension();
            $originalName = $image->getClientOriginalName();
            $image->storeAs('public/barang/' , $originalName);
        }

        $barang = new barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->category = $request->category;
        $barang->images = $originalName;
        $barang->harga = $request->harga;
        $barang->stock = $request->stock;
        $barang->supplier_id = $request->supplier;
        $barang->save();

        return redirect()->route('view.barang')->with('message','Data created is successfully');
    }
}
