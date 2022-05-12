<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class BarangController extends Controller
{
    //
    public function BarangView(){
        // $allDataUser=User::all();
        $data['allDataBarang']=Barang::all();
        return view('backend.barang.view_barang',$data);
    }

    public function BarangAdd(){
        return view('backend.barang.add_barang');
    }

    public function BarangStore(Request $_request){
        // dd($request);
        $validatedData=$_request->validate([
            // 'email' =>'required|unique:users',
            'nama' =>'required',
        ]);
        $data=new Barang();
        $data->nama=$_request->nama;
        $data->jumlah=$_request->jumlah;
        $data->harga=$_request->harga;
        $data->Save();

        return redirect()->route('barang.view')->with('info','Barang Berhasil Ditambahkan');
    }
}
