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

        return redirect()->route('barang.view')->with('info','Data Barang Berhasil Ditambahkan');
    }

    public function BarangEdit($id){
        // dd('berhasil masuk controller user edit');
        $editData= Barang::find($id);
        return view('backend.barang.edit_barang', compact('editData'));
    }

    public function BarangUpdate(Request $_request, $id){
        // dd($request);
        $validatedData=$_request->validate([
            // 'email' =>'required|unique:users',
            'nama' =>'required',
        ]);
        $data=Barang::find($id);
        $data->nama=$_request->nama;
        $data->jumlah=$_request->jumlah;
        $data->harga=$_request->harga;
        // $data->password=bcrypt($_request->password);
        $data->Save();

        return redirect()->route('barang.view')->with('info','Data Barang Berhasil Diupdate');
    }
    public function BarangDelete($id){
        // dd('berhasil masuk controller user edit');
        $deleteData= Barang::find($id);
        $deleteData->delete();
        
        return redirect()->route('barang.view')->with('info','Data Barang Berhasil Dihapus');
    }
}
