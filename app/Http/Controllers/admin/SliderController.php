<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;


class SliderController extends Controller
{
    public function slider ()
    {
       $data['slider'] = DB::table('sliders')->get();
       return view('backend.slider.slider', $data);
    }

    public function input_slider ()
    {
       // $data['brand'] = DB::table('tb_brand')->get();
       return view('backend.slider.input_slider');
    }

    public function save_slider(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'judul_slider' => 'required',
            'gambar_slider' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_slider')
                ->withErrors($validator)
                ->withInput();
        }
        $file= $r->file('gambar_slider');
        $fileName= $file->getClientOriginalName();
        $file->move('slider/', $fileName);
        
        $simpan = Slider::insert([
            'judul_slider' => $r->judul_slider,
            'gambar_slider' => $fileName,
            
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('slider')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('input_slider')->with('error','Data gagal disimpan');
        }
    }

     public function edit_slider($id)
    {
            $data['slider'] = DB ::table('sliders')->where('id_slider', $id)->first();
            return view('backend.slider.edit_slider',$data);
    }

    public function update_slider(Request $r)
    {
    	$id=$r->id_slider;
        $validator = Validator::make($r->all(),[
            'judul_slider' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_slider')
                ->withErrors($validator)
                ->withInput();
        }
// dd($r->file('gambar_slider'));
        if ($r->file('gambar_slider') == NULL){
            $simpan = Slider::where('id_slider', $id)->update([
            'judul_slider' => $r->judul_slider,
          ]);
        }else{
            $fotolama= DB::table('sliders')->where('id_slider', $id)->first();
            //dd($fotolama);
            if ($fotolama->gambar_slider != NULL) {
                unlink('slider/'. $fotolama->gambar_slider);
            }

            $file= $r->file('gambar_slider');
            $fileName= $file->getClientOriginalName();
            $file->move('slider/', $fileName);

            $simpan = Slider::where('id_slider', $id)->update([
            'judul_slider' => $r->judul_slider,
            'gambar_slider' => $fileName,
        ]);
        }

       
        if ($simpan == TRUE) {
            return redirect()->route('slider')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('edit_slider', ['id_slider' => $id])->with('error','Data gagal disimpan');
        }

    }

    public function hapus_slider($id)
    {

        $hapus = DB::table('sliders')->where('id_slider', $id)->delete();
        if ($hapus == TRUE) {
            return redirect()->route('slider')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('slider')->with('error','Data gagal dihapus');
        }
    }
}
