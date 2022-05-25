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
        ]);

        if($validator->fails()){
            return redirect('input_brand')
                ->withErrors($validator)
                ->withInput();
        }
        
        $simpan = Brand::insert([
            'nama_brand' => $r->nama_brand,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('brand')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_brand')->with('error','Data gagal disimpan');
        }

    }

    public function edit_brand($id)
    {
            $data['brand'] = DB ::table('tb_brand')->where('id_brand', $id)->first();
            return view('backend.brand.edit',$data);
    }

    public function update_brand(Request $r)
    {
    	$id=$r->id_brand;
        $validator = Validator::make($r->all(),[
            'nama_brand' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_brand')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Brand::where('id_brand', $id)->update([
           'nama_brand' => $r->nama_brand,
        ]);
        

       
        if ($simpan == TRUE) {
            return redirect()->route('brand')->with('success','Data berhasil Diedit');
        }else{
            return redirect()->route('edit_brand',$id)->with('error','Data gagal diedit');
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
