<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Userapp;
use Illuminate\Support\Facades\DB;

use App\Models\UserModel;
use Session;


class UserappController extends Controller
{
    public function userapp ()
    {
       $data['user'] = DB::table('userapps')->get();
       return view('backend.user.user', $data);
    }

    public function input_user ()
    {
       // $data['slider'] = DB::table('sliders')->get();
       return view('backend.user.input_user');
    }

    public function save_user(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_tlpn' => 'required',
            'password' => 'required',
            
        ]);

        if($validator->fails()){
            return redirect('input_user')
                ->withErrors($validator)
                ->withInput();
        }
        
        
        $simpan = Userapp::insert([
            'nama_user' => $r->nama_user,
            'username' => $r->username,
            'email' => $r->email,
            'no_tlpn' => $r->no_tlpn,
            'password' => Hash::make($r->password),
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('user')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_user')->with('error','Data gagal disimpan');
        }
    }

    public function edit_user($id)
    {
       $data['user'] = DB ::table('userapps')->where('id', $id)->first();
       return view('backend.user.edit_user', $data);
    }

    public function update_user(Request $r)
    {
        $id=$r->id;
        $validator = Validator::make($r->all(),[
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_tlpn' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_user')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Userapp::where('id', $id)->update([
           'nama_user' => $r->nama_user,
            'username' => $r->username,
            'email' => $r->email,
            'no_tlpn' => $r->no_tlpn,
            'password' => $r->password,
        ]);
        

       
        if ($simpan == TRUE) {
            return redirect()->route('user')->with('success','Data berhasil Diedit');
        }else{
            return redirect()->route('edit_user',$id)->with('error','Data gagal diedit');
        }

    }


    public function hapus_user($id)
    {

        $hapus = DB::table('userapps')->where('id', $id)->delete();
        if ($hapus == TRUE) {
            return redirect()->route('user')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('user')->with('error','Data gagal dihapus');
        }
    }

    public function login ()
    {
       // $data['slider'] = DB::table('sliders')->get();
       return view('backend.login');
    }


    // public function aksi_login(Request $r)
    // {
    // 	$aksi_login = $r->validate([
    //         'email' => ['required'],
    //         'password' => ['required'],
    //     ]);


    //     if (Auth::guard('login')->attempt($aksi_login)) {
    //     	$r->session()->regenerate();

    //     	return redirect('admin/index');
    //     }

    //     return back();
    // }

    public function aksi_login(Request $r)
    {
        $email = $r->email;
        $password = $r->password;

        $data_user = UserModel::ChekLoginUser($email, $password);

        if ($data_user == True) {

            Session::put('nama_user', $data_user->nama_user);
            Session::put('username', $data_user->username);
            Session::put('email', $data_user->email);
            Session::put('no_tlpn', $data_user->no_tlpn);

            echo '<script>
                    alert("Login Sukses")
                    window.location = "dashboard"
                </script>';

        } else {

            echo '<script>
                alert("Username / Password Salah !")
                window.location = "/admin"
                </script>';
        }
    }

    public function adminLogout(Request $r){
        Auth::guard('login')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }
    
}
