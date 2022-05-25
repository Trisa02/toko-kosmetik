<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function kategori ()
    {
       $data['kategori'] = DB::table('kategoris')->get();
       return view('backend.kategori.kategori', $data);
    }

    public function input_kategori ()
    {
       
       return view('backend.kategori.input_kategori');
    }

    public function save_kategori(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'nama_kategori' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_kategori')
                ->withErrors($validator)
                ->withInput();
        }
        
        $simpan = Kategori::insert([
            'nama_kategori' => $r->nama_kategori,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('kategori')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_kategori')->with('error','Data gagal disimpan');
        }

    }

    public function edit_kategori($id)
    {
            $data['kategori'] = DB ::table('kategoris')->where('id_kategori', $id)->first();
            return view('backend.kategori.edit_kategori',$data);
    }

    public function update_kategori(Request $r)
    {
    	$id=$r->id_kategori;
        $validator = Validator::make($r->all(),[
            'nama_kategori' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_kategori')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Kategori::where('id_kategori', $id)->update([
           'nama_kategori' => $r->nama_kategori,
        ]);
        

       
        if ($simpan == TRUE) {
            return redirect()->route('kategori')->with('success','Data berhasil Diedit');
        }else{
            return redirect()->route('edit_kategori',$id)->with('error','Data gagal diedit');
        }

    }

    public function hapus_kategori($id)
    {

        $hapus = DB::table('kategoris')->where('id_kategori', $id)->delete();
        if ($hapus == TRUE) {
            return redirect()->route('kategori')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('kategori')->with('error','Data gagal dihapus');
        }
    }


}
