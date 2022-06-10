<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Keranjang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KeranjanggController extends Controller
{
    public function keranjang ()
    {
       $data['keranjang'] = DB::table('keranjangs')
		->join('barangs', 'keranjangs.id_barang', '=', 'barangs.id_barang')
    	->get();
       return view('backend.keranjang.keranjang', $data);
    }

    public function input_keranjang ()
    {
       //$data['kategori'] = DB::table('kategoris')->get();
       $data['barang']= DB::table('barangs')->get();
       return view('backend.keranjang.input_keranjang', $data);
    }

    public function save_keranjang(Request $r)
    {
        $validator = Validator::make($r->all(),[
            
            'id_barang' => 'required',
            'stok_keranjang' => 'required',
            'tanggal' => 'required',
            'detail' => 'required',
            'harga' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_keranjang')
                ->withErrors($validator)
                ->withInput();
        }

        $total_penjualan = $r->stok_keranjang * $r->harga;
        
        $simpan = Keranjang::insert([
            'id_transaksi' => $r->id_transaksi,
            'id_barang' => $r->id_barang,
            'stok_keranjang' => $r->stok_keranjang,
            'tanggal' => $r->tanggal,
            'harga' => $r->harga,
            'detail' => $r->detail,
            'total' => $total_penjualan,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('keranjang')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_keranjang')->with('error','Data gagal disimpan');
        }
    }

    public function edit_keranjang($id_keranjang)
    {
    	$data['keranjang'] = DB::table('keranjangs')->where('id_keranjang', $id_keranjang)->first();
    	$data['barang']= DB::table('barangs')->get();
        return view('backend.keranjang.edit_keranjang', $data);
    }

    public function update_keranjang(Request $r)
    {
    	$id = $r->id_keranjang;
        $validator = Validator::make($r->all(),[
            
            'id_barang' => 'required',
            'stok_keranjang' => 'required',
            'tanggal' => 'required',
            'detail' => 'required',
            'harga' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_keranjang')
                ->withErrors($validator)
                ->withInput();
        }

        $total_penjualan = $r->stok_keranjang * $r->harga;
        
        $simpan = Keranjang::where('id_keranjang', $id)->update([
            'id_transaksi' => $r->id_transaksi,
            'id_barang' => $r->id_barang,
            'stok_keranjang' => $r->stok_keranjang,
            'tanggal' => $r->tanggal,
            'harga' => $r->harga,
            'detail' => $r->detail,
            'total' => $total_penjualan,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('keranjang')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_keranjang')->with('error','Data gagal disimpan');
        }
    }

    public function hapus_keranjang($id)
    {

        $hapus = DB::table('keranjangs')->where('id_keranjang', $id)->delete();
        if ($hapus == TRUE) {
            return redirect()->route('keranjang')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('keranjang')->with('error','Data gagal dihapus');
        }
    }
}
