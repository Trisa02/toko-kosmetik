<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function cart(){
        // dd(Auth::id());
        if(Auth::user() != null){
            // return redirect()->route('home');
            $data['kategori'] = DB::table('kategoris')->get();
            $data['cart'] = DB::table('tb_keranjangtmps')
            ->join('barangs','tb_keranjangtmps.id_barang','=','barangs.id_barang')->get();
            return view ('Keranjang.cart',$data);
        }else{
            return redirect()->route('logint');

        }
    }

    public function keranjang(Request $request){
        $validator = Validator::make($request->all(),[
            'id_barang' => 'required'
        ]);

        if($validator->fails()){
            return redirect('cart')
            ->withErrors($validator)
            ->withInput();
        }else{
            $id = Auth::user()->id;
            //ambil harga barang dari id barang
            $barang = Db::table('barangs')->where('id_barang',$request->id_barang)->first();
            //setelah data hargabarang di dapat maka jumlah dikali harga
            $harga = $barang->harga;
            $total = $harga * $request->qty;

            //cek id barang yang sama
            $cek = DB:: table('tb_keranjangtmps')->where('id_barang',$request->id_barang)
            ->where('id',$id)->first();
            if($cek==TRUE){
                $simpan = DB::table('tb_keranjangtmps')->where('id_keranjang',$cek->id_keranjang)->update([
                    'qty'=>$cek->qty+1,
                    'total'=>$cek->total+$harga,
                ]);
            }else{
                $simpan=DB::table('tb_keranjangtmps')->insert([
                    'id'=>$id,
                    'id_barang'=>$request->id_barang,
                    'tanggal'=>date('Y-m-d'),
                    'qty'=>$request->qty,
                    'total'=>$total,
                ]);
            }
        }
        if($simpan == TRUE){
            return redirect('cart')->with('success','Data Berhasil Disimpna');
        }
        else{
            return redirect('cart')->with('error','Data Gagal Disimpan');
        }
    }

    public function hapus($id){
        $hapus = DB::table('tb_keranjangtmps')->where('id_keranjang',$id)->delete();
        if($hapus==TRUE){
            return redirect('cart')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect('cart')->with('Error','Data Gagal Dihapus');
        }
    }

    public function qtytambah($id_keranjang,$id_barang){
        //ambil id_barang,id_keranjang,id user
        $id = Auth::user()->id;
        //buka tabel keranjangtmps berdasarkan id keranjang
        $keranjang = DB::table('tb_keranjangtmps')->join('barangs','tb_keranjangtmps.id_barang','=','barangs.id_barang')
        ->where('id_keranjang',$id_keranjang)->first();

        //muncul qty tambah id_barang
        $qty = $keranjang->qty;
        //tambah  qty(+1)
        $total = $qty+1;

        $harga = $keranjang->harga;
        $ttl = $total*$harga;
        //update
        $update = DB::table('tb_keranjangtmps')->where('id_keranjang',$id_keranjang)
        ->update(['qty'=>$total,'total'=>$ttl]);
        return back();
    }

    public function qtykurang($id_keranjang,$id_barang){
        $id = Auth::user()->id;
        $keranjang = DB::table('tb_keranjangtmps')->join('barangs','tb_keranjangtmps.id_barang','=','barangs.id_barang')
        ->where('id_keranjang',$id_keranjang)->first();

        $qty = $keranjang->qty;
        $total = $qty-1;
        if($total<=0){
            DB::table('tb_keranjangtmps')->where('id_keranjang',$id_keranjang)->delete();
        }else{
            $harga = $keranjang->harga;
            $ttl = $total*$harga;

            $update=DB::table('tb_keranjangtmps')->where('id_keranjang',$id_keranjang)
            ->update(['qty'=>$total,'total'=>$ttl]);
        }
        return back();
    }

}
