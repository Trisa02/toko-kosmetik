<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Detailcontroller;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//route frontend ini untuk ica
Route::get('/',[Homecontroller::class, 'index'])->name('home');



Route::group(['middleware'=>'guest:member'],function(){
    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('aksilogin',[LoginController::class,'aksilogin'])->name('aksilogin');
    Route::get('register',[LoginController::class,'register'])->name('register');
    Route::post('input',[LoginController::class,'input'])->name('input');



});

Route::group(['middleware'=>['web','auth:member']],function(){
    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('keranjang',[KeranjangController::class,'keranjang'])->name('keranjang');
    Route::get('akun',[AkunController::class,'akun'])->name('akun');
    Route::post('edit/akun/{id}',[AkunController::class,'editakun'])->name('editakun');
    // Route::get('akun/{id}',[AkunController::class,'akun'])->name('akun');
    Route::post('logout',[Logincontroller::class,'logout'])->name('logout');
Route::get('detail',[DetailController::class,'detail'])->name('detail');

});



//route backend ini untuk dian
Route::get('/backend', function () {
    return view('welcome');
});
