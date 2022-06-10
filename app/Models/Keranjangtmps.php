<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjangtmps extends Model
{
    use HasFactory;
    protected $table ='tb_keranjangtmps';
    protected $fillable = [
        'id',
        'id_barang',
        'tanggal',
        'qty',
        'total',
    ];
}
