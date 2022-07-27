<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stnk;

class StnkController extends Controller
{
    //
    public function StnkView(){
        // $allDataUser=User::all();
        $data['allDataStnk']=Stnk::all();
        return view('backend.stnk.view_stnk',$data);
    }
    public function StnkAdd(){
        return view('backend.stnk.add_stnk');
    }

    public function StnkStore(Request $_request){
        // dd($request);
        $validatedData=$_request->validate([
            // 'email' =>'required|unique:users',
            'pemilik' =>'required',
        ]);
        $data=new Stnk();
        $data->noplat=$_request->noplat;
        $data->pemilik=$_request->pemilik;
        $data->harga=$_request->harga;
        $data->Save();

        return redirect()->route('stnk.view')->with('info','Data Barang Berhasil Ditambahkan');
    }
    public function StnkEdit($id){
        // dd('berhasil masuk controller user edit');
        $editData= Stnk::find($id);
        return view('backend.stnk.edit_stnk', compact('editData'));
    }

    public function StnkUpdate(Request $_request, $id){
        // dd($request);
        $validatedData=$_request->validate([
            // 'email' =>'required|unique:users',
            'harga' =>'required',
        ]);
        $data=Stnk::find($id);
        $data->noplat=$_request->noplat;
        $data->pemilik=$_request->pemilik;
        $data->harga=$_request->harga;
        // $data->password=bcrypt($_request->password);
        $data->Save();

        return redirect()->route('stnk.view')->with('info','Data Barang Berhasil Diupdate');
    }
    public function StnkDelete($id){
        // dd('berhasil masuk controller user edit');
        $deleteData= Stnk::find($id);
        $deleteData->delete();
        
        return redirect()->route('stnk.view')->with('info','Data Barang Berhasil Dihapus');
    }
}
