<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});



//route backend ini untuk dian
Route::get('/backend', function () {
    return view('welcome');
});
