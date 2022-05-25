<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view ('login');
    }

    public function register(){
        return view('register');
    }

    public function input(Request $request){
        $this->validate($request,[
            'nama_user'=>'required',
            'username'=>'required',
            'email_user'=>'required',
            'password'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
            'gambar'=>'required'
        ]);

        $file = $request->file('gambar');
        $fileName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move('gambar/',$fileName);

        Login::create([
            'nama_user'=>$request->nama_user,
            'username'=>$request->username,
            'email_user'=>$request->email_user,
            'password'=>Hash::make($request->password),
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
            'gambar'=>$fileName
        ]);
        return redirect('/');
    }

    public function aksilogin(Request $r){
        $login = $r->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('member')->attempt($login)){
            $r->session()->regenerate();
            return redirect()->route('home');
        }
        return back();
    }

    public function logout(Request $r){
        Auth::guard('member')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }

}
