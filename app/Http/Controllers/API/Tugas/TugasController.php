<?php

namespace App\Http\Controllers\API\Tugas;

use App\Http\Controllers\Controller;
use App\Models\barang;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    //
    public function getAll(){
        $data = DB::table('barangs')
        ->orderBy('id','desc')
        ->get();
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validateData=$request->validate([
            'id' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $data=new Barang;
        $data->id=$request->id;
        $data->nama=$request->nama;
        $data->jumlah=$request->jumlah;
        $data->harga=$request->harga;
        $data->save();

        return response()->json($data, 201);

    }

    public function update(Request $request){
        $validateData=$request->validate([
            'id' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $data = Barang::where('id','=',$request->id)->first();
        $data->id=$request->id;
        $data->nama=$request->nama;
        $data->jumlah=$request->jumlah;
        $data->harga=$request->harga;
        $data->save();

        return response()->json($data, 201);

    }
    public function destroy(Request $request){
        $data = Barang::where('id','=',$request->id)->first();

        if(!empty($data)){
            $data->delete();

            return response()->json($data, 200);

        } else{
            return response()->json([
                'eror' => 'data tidak ditemukan',
            ], 404); 
        }
    }
}