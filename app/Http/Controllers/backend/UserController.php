<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class UserController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;
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

    public function UserEdit($id){
        // dd('berhasil masuk controller user edit');
        $editData= User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UserUpdate(Request $_request, $id){
        // dd($request);
        $validatedData=$_request->validate([
            'email' =>'required|unique:users',
            'textNama' =>'required',
        ]);
        $data=User::find($id);
        $data->name=$_request->textNama;
        $data->usertype=$_request->selectUser;
        $data->email=$_request->email;
        // $data->password=bcrypt($_request->password);
        $data->Save();

        return redirect()->route('user.view')->with('info','User Berhasil Diupdate');
    }
    public function UserDelete($id){
        // dd('berhasil masuk controller user edit');
        $deleteData= User::find($id);
        $deleteData->delete();
        
        return redirect()->route('user.view')->with('info','User Berhasil Dihapus');
    }
}
