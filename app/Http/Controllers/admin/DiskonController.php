<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Diskon;
use Illuminate\Support\Facades\DB;

class DiskonController extends Controller
{
    public function diskon()
    {
       $data['diskon'] = DB::table('diskons')
		->join('barangs', 'diskons.id_barang', '=', 'barangs.id_barang')
    	->get();
       return view('backend.diskon.diskon', $data);
    }

    public function input_diskon()
    {
    	$data['barang']= DB::table('barangs')->get();
       return view('backend.diskon.input_diskon', $data);
    }

    public function save_diskon(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'id_barang' => 'required',
            'detail_diskon' => 'required',
            'gambar_diskon' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_diskon')
                ->withErrors($validator)
                ->withInput();
        }
        $file= $r->file('gambar_diskon');
        $fileName= $file->getClientOriginalName();
        $file->move('gambar/', $fileName);
        
        $simpan = Diskon::insert([
            'id_barang' => $r->id_barang,
            'detail_diskon' => $r->detail_diskon,
            'gambar_diskon' => $fileName,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('diskon')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_diskon')->with('error','Data gagal disimpan');
        }
    }

    public function hapus_diskon($id)
    {

        $hapus = DB::table('diskons')->where('id_diskon', $id)->delete();
        if ($hapus == TRUE) {
            return redirect()->route('diskon')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('diskon')->with('error','Data gagal dihapus');
        }
    }

}
