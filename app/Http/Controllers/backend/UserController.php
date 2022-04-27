<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function UserView(){
        // $allDataUser=User::all();
        $data['allDataUser']=User::all();
        return view('backend.user.view_user',$data);
    }

    public function UserAdd(){
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.user.add_user');
    }
    public function UserStore(Request $_request){
        // dd($request);
        $validatedData=$_request->validate([
            'email' =>'required|unique:users',
            'textNama' =>'required',
        ]);
        $data=new User();
        $data->name=$_request->textNama;
        $data->usertype=$_request->selectUser;
        $data->email=$_request->email;
        $data->password=bcrypt($_request->password);
        $data->Save();

        return redirect()->route('user.view')->with('info','User Berhasil Ditambahkan');
    }
}
