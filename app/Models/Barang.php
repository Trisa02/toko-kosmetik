<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'id_kategori',
        'id_brand',
        'nama_barang',
        'stok',
        'harga',
        'detail',
        'gambar',
    ];
}
