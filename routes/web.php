<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Detailcontroller;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\BarangController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\UserappController;
use App\Http\Controllers\admin\DiskonController;
use App\Http\Controllers\admin\KeranjanggController;


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
Route::get('detail/{id_barang}',[HomeController::class,'detail'])->name('detail');


Route::group(['middleware'=>'guest:member'],function(){
    Route::get('logint',[LoginController::class,'logint'])->name('logint');
    Route::post('aksilogint',[LoginController::class,'aksilogint'])->name('aksilogint');
    Route::get('registert',[LoginController::class,'register'])->name('registert');
    Route::post('input',[LoginController::class,'input'])->name('input');



});

Route::group(['middleware'=>['web','auth:member']],function(){
    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('keranjang',[KeranjangController::class,'keranjang'])->name('keranjang');
    Route::get('akun',[AkunController::class,'akun'])->name('akun');
    Route::post('edit/akun/{id}',[AkunController::class,'editakun'])->name('editakun');
    // Route::get('akun/{id}',[AkunController::class,'akun'])->name('akun');
    Route::post('logout',[Logincontroller::class,'logout'])->name('logout');

});



//route backend ini untuk dian

Route::group(['prefix' => 'admin'],function () {


    
        Route::get('/',[UserappController::class, 'login'])->name('login');
        Route::post('aksi_login',[UserappController::class, 'aksi_login'])->name('aksi_login');
    	Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');



    	Route::get('brand',[BrandController::class, 'brand'])->name('brand');
    	Route::get('input_brand',[BrandController::class, 'input_brand'])->name('input_brand');
    	Route::post('save_data',[BrandController::class, 'save_data'])->name('save_data');
        Route::get('hapus_brand/{id_brand}',[BrandController::class, 'hapus_brand'])->name('hapus_brand');

    	Route::get('kategori',[KategoriController::class, 'kategori'])->name('kategori');
    	Route::get('input_kategori',[KategoriController::class, 'input_kategori'])->name('input_kategori');
    	Route::post('save_kategori',[KategoriController::class, 'save_kategori'])->name('save_kategori');
    	Route::get('edit_kategori/{id_kategori}',[KategoriController::class, 'edit_kategori'])->name('edit_kategori');
    	Route::post('update_kategori',[KategoriController::class, 'update_kategori'])->name('update_kategori');
    	Route::get('hapus_kategori/{id_kategori}',[KategoriController::class, 'hapus_kategori'])->name('hapus_kategori');

    	Route::get('barang',[BarangController::class, 'barang'])->name('barang');
    	Route::get('input_barang',[BarangController::class, 'input_barang'])->name('input_barang');
    	Route::post('save_barang',[BarangController::class, 'save_barang'])->name('save_barang');
    	Route::get('edit_barang/{id_barang}',[BarangController::class, 'edit_barang'])->name('edit_barang');
    	Route::post('update_barang',[BarangController::class, 'update_barang'])->name('update_barang');
    	Route::get('hapus_barang/{id_barang}',[BarangController::class, 'hapus_barang'])->name('hapus_barang');

    	Route::get('slider',[SliderController::class, 'slider'])->name('slider');
    	Route::get('input_slider',[SliderController::class, 'input_slider'])->name('input_slider');
    	Route::post('save_slider',[SliderController::class, 'save_slider'])->name('save_slider');
    	Route::post('update_slider',[SliderController::class, 'update_slider'])->name('update_slider');
    	Route::get('edit_slider/{id_slider}',[SliderController::class, 'edit_slider'])->name('edit_slider');
    	Route::get('hapus_slider/{id_slider}',[SliderController::class, 'hapus_slider'])->name('hapus_slider');

    	Route::get('user',[UserappController::class, 'userapp'])->name('user');
        Route::get('input_user',[UserappController::class, 'input_user'])->name('input_user');
        Route::post('save_user',[UserappController::class, 'save_user'])->name('save_user');
        Route::get('edit_user/{id}',[UserappController::class, 'edit_user'])->name('edit_user');
        Route::post('update_user',[UserappController::class, 'update_user'])->name('update_user');
        Route::get('hapus_user/{id}',[UserappController::class, 'hapus_user'])->name('hapus_user');
    	
    	
        Route::post('adminLogout',[UserappController::class,'adminLogout'])->name('adminLogout');

        Route::get('member',[AkunController::class, 'member'])->name('member');

        Route::get('diskon',[DiskonController::class, 'diskon'])->name('diskon');
        Route::get('input_diskon',[DiskonController::class, 'input_diskon'])->name('input_diskon');
        Route::post('save_diskon',[DiskonController::class, 'save_diskon'])->name('save_diskon');
        Route::get('hapus_diskon/{id_diskon}',[DiskonController::class, 'hapus_diskon'])->name('hapus_diskon');

        Route::get('keranjang',[KeranjanggController::class, 'keranjang'])->name('keranjang');
        Route::get('input_keranjang',[KeranjanggController::class, 'input_keranjang'])->name('input_keranjang');
        Route::post('save_keranjang',[KeranjanggController::class, 'save_keranjang'])->name('save_keranjang');
        Route::get('edit_keranjang/{id}',[KeranjanggController::class, 'edit_keranjang'])->name('edit_keranjang');
        Route::post('update_keranjang',[KeranjanggController::class, 'update_keranjang'])->name('update_keranjang');
        Route::get('hapus_keranjang/{id}',[KeranjanggController::class, 'hapus_keranjang'])->name('hapus_keranjang');
});
