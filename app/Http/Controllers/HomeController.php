<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Barang;

class HomeController extends Controller
{
    public function index()
    {
        $data['barang']=DB::table('barangs')->get();
        $data['kategori']=DB::table('kategoris')->get();
        return view('home',$data);
    }

    public function detail($id){
        $data['barang']=DB::table('barangs')->where('id_barang',$id)->get();
        $data['id_barang']=$id;
        return view('Produk.detailproduk',$data);
    }


}
