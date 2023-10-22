<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\supplier;

class SupplierController extends Controller
{
    public function index(){
        $supplier = supplier::paginate(10);
        return view('Admin.supplier', compact('supplier'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = new supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_telp = $request->no_telp;
        $supplier->jk = $request->jk;
        $supplier->alamat = $request->alamat;
        $supplier->save();

        return redirect()->route('view.supplier')->with('massage','Data has created successfully');
    }

    public function edit(Request $request){
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = supplier::findOrFail($request->id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_telp = $request->no_telp;
        $supplier->jk = $request->jk;
        $supplier->alamat = $request->alamat;
        $supplier->save();

        return redirect()->route('view.supplier')->with('massage','Data has created successfully');
    }

    public function delete($id){
        $supplier = supplier::findOrFail($id);
        if($supplier){
            $supplier->delete();
            return redirect()->route('view.supplier')->with('message', 'Data has Deleted successfully');
        }else{
            return redirect()->route('view.supplier')->with('message', 'Data is not found');
        }
    }
}
