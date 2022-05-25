<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $table ='tb_user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nama_user',
        'username',
        'email_user',
        'password',
        'alamat',
        'telepon',
        'gambar',
    ];
}
