<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;
    protected $table = 'diskons';
    protected $fillable = [
        'id_barang',
        'detail_diskon',
        'gambar_diskon',
    ];
}
