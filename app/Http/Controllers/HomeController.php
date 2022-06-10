<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Barang;

class HomeController extends Controller
{
    public function index()
    {

        $data['barang'] = DB::table('barangs')->get();
        $data['kategori']=DB::table('kategoris')->get();
        $data['brands']=DB::table('tb_brand')->get();
        return view('home',$data);
    }

    public function detail($slug){

        $data['barang'] = DB::table('barangs')->get();
        $data['detail']=DB::table('barangs')->where('slug_barang',$slug)->get();
        return view('Produk.detailproduk',$data);
    }

    public function kategori_produk($slug_kategori)
    {
        $data['kategori']=DB::table('kategoris')->where('slug_kategori',$slug_kategori)->get();
        $data['perkategori']=DB::table('kategoris')
        ->join('barangs','kategoris.id_kategori','=','barangs.id_kategori')
        ->where('kategoris.slug_kategori',$slug_kategori)->get();
        // $data['kategori']=DB::table('kategoris')->get();

        return view('produk.produkperkategori',$data);
    }

    public function cari(Request $request){
        $tnama = $request->tnama;
        $data['cekNama'] = DB::table('barangs')->where('nama_barang','like',"%".$tnama."%")->get();
        // dd($data['cekNama']);
        return view('produk.cariproduk',$data);
    }

    public function brands($nama_brand){
        $data['brands']=DB::table('tb_brand')->where('nama_brand',$nama_brand)->get();
        $data['perbrands']=DB::table('tb_brand')
        ->join('barangs','tb_brand.id_brand','=','barangs.id_brand')
        ->where('tb_brand.nama_brand',$nama_brand)->get();
        return view('produk.perbrands',$data);
    }


}
