<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KeranjangController extends Controller
{
    public function keranjang(){
        // dd(Auth::id());
        if(Auth::user() != null){
            // return redirect()->route('home');
        return view ('Keranjang.keranjang');

        }else{
            return redirect()->route('logint');

        }

    }
}
