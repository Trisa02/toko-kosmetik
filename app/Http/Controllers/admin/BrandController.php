<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function brand ()
    {
       $data['brand'] = DB::table('tb_brand')->get();
       return view('backend.brand.brand',$data);
    }

    public function input_brand ()
    {
       return view('backend.brand.input_brand');
    }

    public function save_data(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'nama_brand' => 'required',
            'foto_brand' => 'required'
        ]);

        if($validator->fails()){
            return redirect('input_brand')
                ->withErrors($validator)
                ->withInput();
        }
        
        $file= $r->file('foto_brand');
        $fileName= $file->getClientOriginalName();
        $file->move('gambar/', $fileName);

        $simpan = Brand::insert([
            'nama_brand' => $r->nama_brand,
            'foto_brand' => $fileName,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('brand')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_brand')->with('error','Data gagal disimpan');
        }

    }
    
    public function hapus_brand($id)
    {

        $hapus = DB::table('tb_brand')->where('id_brand', $id)->delete();
        if ($hapus == TRUE) {
            return redirect()->route('brand')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('brand')->with('error','Data gagal dihapus');
        }
    }
}
