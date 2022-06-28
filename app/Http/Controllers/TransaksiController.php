<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use App\Models\Keranjangtmps;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{

    public function penjualan(Request $request){
        $id = Auth::user()->id;
        // dd(Auth::id());
        $data['keranjangtmps']=DB::table('tb_keranjangtmps')->join('barangs','barangs.id_barang','tb_keranjangtmps.id_barang')->where('id',$id)->get();
        $data['barang']=DB::table('barangs')->get();

        return view('Keranjang.penjualan',$data);

        // $dataInv = DB::table('tb_transaksis')->orderBy('id_transaksi','DESC')->first();
        // if($dataInv != NULL){
        //     $kode = $dataInv->invoice + 1;
        //     $invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
        // }else{
        //     $kode = 1;$invoice =str_pad($kode,6,'0',STR_PAD_LEFT);
        //     $invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
        // }
        // $data['invoice']=$invoice;

    }

    public function selesai($invoice){
        $id = Auth::user()->id;
        // dd(Auth::id());
        $data['selesai']=DB::table('tb_transaksis')->where('order_id', $invoice)->first();

        $data['keranjang'] = DB::table('tb_penjualans')
        ->join('tb_user', 'tb_penjualans.id', '=', 'tb_user.id')
        ->join('barangs', 'tb_penjualans.id_barang', '=', 'barangs.id_barang')
        ->where('invoice', $invoice)
        ->get();

        $data['user']=DB::table('tb_user')->where('id',$id)->first();

        $data['kota'] = DB::table('cities')->where('city_id', Auth::user()->city_destination)->first();

        return view ('Keranjang.transaksi_selesai',$data);
    }

    public function get_snap_token(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-JHaJcvub_uXNh50dn4rZAI3c';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = DB::table('tb_user')->where('id', $request->id_user)->first();
        $invoice = 'INV'.time();

        $keranjang = DB::table('tb_keranjangtmps')->where('id', $request->id_user)->get();
        foreach($keranjang as $k => $val){
            DB::table('tb_penjualans')->insert([
                'id' => $request->id_user,
                'invoice' => $invoice,
                'id_barang' => $val->id_barang,
                'qty' => $val->qty,
                'total' => $val->total,
                'tanggal' => $val->tanggal,
            ]);
        }

        $params = array(
            'transaction_details' => array(
                'order_id' => $invoice,
                'gross_amount' => $request->total_belanja,
            ),
            'customer_details' => array(
                'first_name' => $user->nama_user,
                'email' => $user->email_user,
                'phone' => $user->telepon,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $data = [
            'status' => 'ok',
            'snaptoken' => $snapToken,
        ];
        return response()->json($data);
    }

    public function send_result_midtrans(Request $request)
    {
        $id= Auth::user()->id;
        $city = DB::table('cities')->where('city_id', Auth::user()->city_destination)->first();
        $tujuan=$city->name;
        $json = json_decode($request->json);
        $asal="Tanggerang";
        // dd($json);
        $simpan = DB::table('tb_transaksis')->insert([
            'id'=>$id,
            'total_bayar'=>$json->gross_amount,
            'asal'=>$asal,
            'tujuan'=>$tujuan,
            'kurir'=>$request->courier,
            'ongkir'=>$request->hasil_ongkir,
            'order_id' => $json->order_id,
            'status_code' => $json->status_code,
            'status_message' => $json->status_message,
            'transaction_id' => $json->transaction_id,
            'payment_type' => $json->payment_type,
            'transaction_time' => $json->transaction_time,
            'transaction_status'=>$json->transaction_status,
            'fraud_status' =>$json->fraud_status ?? null,
            // 'bill_key'=>$json->bill_key,
            // 'biller_code'=>$json->biller_code,
            // 'pdf_url'=>$json->pdf_url,
            // 'finish_redirect_url'=>$json->finish_redirect_url,
        ]);
        // dd($simpan);
        if($simpan==TRUE){
            return redirect()->route('transaksi-selesai', ['invoice' => $json->order_id])->with('Success','Permintaan Anda sedang di proses');
        }else{
            return redirect('penjualan')->with('Error','Permintaan Gagal');
        }
    }


}
