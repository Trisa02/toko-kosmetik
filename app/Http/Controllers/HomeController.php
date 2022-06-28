<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $data['barang'] = DB::table('barangs')->get();
        $data['kategori']=DB::table('kategoris')->get();
        $data['brands']=DB::table('tb_brand')->get();
        $data['jumlah']=DB::table('tb_keranjangtmps')->where('id',session('id_user'))->count();
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

    public function riwayat_transaksi(){
        $id = Auth::user()->id;

        // dd($id);
        $transaksi = DB::table('tb_transaksis')
        ->where('id', $id)
        ->get();
        foreach($transaksi as $key => $val){
            $riwayat[$val->order_id] = [
                'invoice' => $val->order_id,
                'total_bayar'=>$val->total_bayar,
                'status' => $val->transaction_status,
                'data' =>  DB::table('tb_penjualans')
                ->join('barangs','tb_penjualans.id_barang','=','barangs.id_barang')
                ->where('invoice', $val->order_id)->get(),
            ];
        }
        // $data['riwayat']=DB::table('tb_penjualans')
        // ->join('barangs','tb_penjualans.id_barang','=','barangs.id_barang')
        // ->where('invoice',$invoice)
        // ->get();
        return view('Riwayat.riwayat_belanja',compact('riwayat'));
    }

    public function detail_transaksi($invoice){
        $id = Auth::user()->id;
        // dd($id);
        $data['user']=DB::table('tb_user')->where('id',$id)->first();

        $data['kota'] = DB::table('cities')->where('city_id', Auth::user()->city_destination)->first();

        $data['transaksi'] = DB::table('tb_transaksis')->where('order_id',$invoice)->first();

        $data['detail'] = DB::table('tb_penjualans')
        ->join('tb_user', 'tb_penjualans.id', '=', 'tb_user.id')
        ->join('barangs', 'tb_penjualans.id_barang', '=', 'barangs.id_barang')
        ->where('invoice', $invoice)
        ->get();
        return view('Riwayat.detail_transaksi',$data);
    }


}
