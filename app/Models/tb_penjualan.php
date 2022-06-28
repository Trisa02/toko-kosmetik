<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_penjualan extends Model
{
    use HasFactory;
    protected $table = 'tb_penjualans';
    protected $fillable = [
        'invoice',
        'id',
        'id_barang',
        'harga',
        'qty',
        'total',
        'tanggal',
    ];
}
