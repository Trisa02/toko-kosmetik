<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userapp extends Model
{
    use HasFactory;
    protected $table = 'userapps';
    protected $fillable = [
        'id_user',
        'nama_user',
        'username',
        'email',
        'no_tlpn',
        'alamat',
        'password',
    ];
}
