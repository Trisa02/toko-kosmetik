<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserappController extends Controller
{
    public function userapp ()
    {
       // $data['slider'] = DB::table('sliders')->get();
       return view('backend.user.user');
    }

    public function login ()
    {
       // $data['slider'] = DB::table('sliders')->get();
       return view('backend.login');
    }

    public function register ()
    {
       // $data['slider'] = DB::table('sliders')->get();
       return view('backend.register');
    }

     public function daftar(Request $r){
    	$validator = Validator::make($r->all(),[
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_tlpn' => 'required',
            'alamat' => 'required',
            'gambar_user' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
        	return back();
        }

        $file= $r->file('gambar_user');
        $fileName= $file->getClientOriginalName();
        $file->move('gambar/', $fileName);

        $simpan = DB::table('userapps')->insert([
            'nama_user' => $r->nama_user,
            'username' => $r->username,
            'email' => $r->email,
            'no_tlpn' => $r->no_tlpn,
            'alamat' => $r->alamat,
            'gambar_user' => $fileName,
            'password' => Hash::make($r->password),
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('login')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('register')->with('error','Data gagal disimpan');
        }
    }

    public function aksi_login(Request $r)
    {
    	$aksi_login = $r->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::guard('login')->attempt($aksi_login)) {
        	$r->session()->regenerate();
        	return redirect('home');
        }

        return back();
    }
    
}
