<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Login;
use Auth;
use App\Models\City;
use App\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class AkunController extends Controller
{
    public function member ()
    {
       $data['member'] = DB::table('tb_user')->get();
       return view('backend.member.member', $data);
    }

    public function akun(){
        $id = Auth::user()->id;
        $data['akun'] = DB::table('tb_user')
        ->where('id',$id)->first();
        $data['provinces'] = Province::pluck('name','province_id');
        return view('Akun.akun',$data);
    }

    public function editakun(Request $request,$id){
        $this->validate($request,[
            'nama_user'=>'required',
            'username'=>'required',
            'email_user'=>'required',
            'province_destination'=>'required',
            'city_destination'=>'required',
            'telepon'=>'required',
        ]);
        if($request->file('gambar')==''){
            Login::where('id',$id)->update([
                'nama_user'=>$request->nama_user,
                'username'=>$request->username,
                'email_user'=>$request->email_user,
                'province_destination'=>$request->province_destination,
                'city_destination'=>$request->city_destination,
                'telepon'=>$request->telepon,
            ]);
        }else{
            $fotolama = DB::table('tb_user')->where('id',$id)->first();
            if($fotolama->gambar != Null){
                unlink('gambar/',$filename);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->move('gambar/',$fileName);

            Login::where('id',$id)->update([
                'nama_user'=>$request->nama_user,
                'username'=>$request->username,
                'email_user'=>$request->email_user,
                'province_destination'=>$request->province_destination,
                'city_destination'=>$request->city_destination,
                'telepon'=>$request->telepon,
                'gambar'=>$fileName
            ]);
        }
        return redirect('akun');
    }


    // public function akun($id){
    //     $data['akun']=DB::table('tb_user')->where('id',$id)->get();
    //     $data['id']=$id;
    //     return view('Akun.akun',$data);
    // }
}
