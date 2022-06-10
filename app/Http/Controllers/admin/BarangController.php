<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function barang ()
    {
       $data['barang'] = DB::table('barangs')
		->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id_kategori')
		->join('tb_brand', 'barangs.id_brand', '=', 'tb_brand.id_brand')
    	->get();
       return view('backend.barang.barang', $data);
    }

    public function input_barang ()
    {
    	$data['kategori']= DB::table('kategoris')->get();
    	$data['brand']= DB::table('tb_brand')->get();
        return view('backend.barang.input_barang', $data);
    }

    public function save_barang(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'id_kategori' => 'required',
            'id_brand' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'detail' => 'required',
            'gambar' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_barang')
                ->withErrors($validator)
                ->withInput();
        }
        $file= $r->file('gambar');
        $fileName= $file->getClientOriginalName();
        $file->move('gambar/', $fileName);

        $simpan = Barang::insert([
            'id_kategori' => $r->id_kategori,
            'id_brand' => $r->id_brand,
            'nama_barang' => $r->nama_barang,
            'stok' => $r->stok,
            'harga' => $r->harga,
            'berat' => $r->berat,
            'detail' => $r->detail,
            'slug_barang' => Str::slug($r->nama_barang),
            'gambar' => $fileName,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('barang')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_barang')->with('error','Data gagal disimpan');
        }
    }

    public function edit_barang($id_barang)
    {
    	$data['barang'] = DB::table('barangs')->where('id_barang', $id_barang)->first();
    	$data['kategori']= DB::table('kategoris')->get();
    	$data['brand']= DB::table('tb_brand')->get();
        return view('backend.barang.edit_barang', $data);
    }

    public function update_barang(Request $r)
    {
    	$id=$r->id_barang;
        $validator = Validator::make($r->all(),[
            'id_kategori' => 'required',
            'id_brand' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'detail' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_barang')
                ->withErrors($validator)
                ->withInput();
        }
        if ($r->file('gambar') == NULL) {
            $simpan = Barang::where('id_barang', $id)->update([
           	'id_kategori' => $r->id_kategori,
            'id_brand' => $r->id_brand,
            'nama_barang' => $r->nama_barang,
            'stok' => $r->stok,
            'harga' => $r->harga,
            'berat' => $r->berat,
            'detail' => $r->detail,
            'slug_barang' => Str::slug($r->nama_barang),
          ]);
        }
        else{
            $fotolama= DB::table('barangs')->where('id_barang', $id)->first();
            //dd($fotolama);
            if ($fotolama->gambar != NULL) {
                unlink('gambar/'. $fotolama->gambar);
            }

            $file= $r->file('gambar');
            $fileName= $file->getClientOriginalName();
            $file->move('gambar/', $fileName);

            $simpan = Barang::where('id_barang', $id)->update([
           	'id_kategori' => $r->id_kategori,
            'id_brand' => $r->id_brand,
            'nama_barang' => $r->nama_barang,
            'stok' => $r->stok,
            'harga' => $r->harga,
            'berat' => $r->berat,
            'detail' => $r->detail,
            'slug_barang' => Str::slug($r->nama_barang),
            'gambar' => $fileName,
        ]);
        }

       
        if ($simpan == TRUE) {
            return redirect()->route('barang')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('edit_barang', $id_barang)->with('error','Data gagal disimpan');
        }

    }

    public function hapus_barang($id)
    {

        $hapus = DB::table('barangs')->where('id_barang', $id)->delete();
        if ($hapus == TRUE) {
            return redirect()->route('barang')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('barang')->with('error','Data gagal dihapus');
        }
    }
}
