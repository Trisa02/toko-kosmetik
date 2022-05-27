<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function logint(){
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

    public function aksilogint(Request $r){
        $login = $r->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('member')->attempt($login)){
            $user = DB::table('tb_user')->where('username',$r->username)->first();
            if(password_verify($r->password,$user->password))
            {
                $r->session()->regenerate();
                $r->session()->put('id_user',$user->id);
                return redirect()->route('home');

            }
        }
        return back();
    }

    public function logout(Request $r){
        $r->session()->forget('id_user');
        Auth::guard('member')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }

}
