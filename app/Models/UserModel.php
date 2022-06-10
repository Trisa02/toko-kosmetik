<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

class UserModel extends Model
{
    use HasFactory;
    protected $table = "userapps";
    protected $primaryKey = "id";
    public $timestamps = false;


    public static function ChekLoginUser($email, $password)
    {
        $data_user = DB::table('userapps')->where("email", $email)->first();
        if($data_user == TRUE)
        {
            if(password_verify($password, $data_user->password))
            {
                return $data_user;
            }
        }else{
            return false;
        }
    }
    
}