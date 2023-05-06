<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ('AuthController@login'));
Route::get('logout', ('AuthController@logout'));
Route::post('loginProses', ('AuthController@loginProses'));
Route::get('/register', ('AuthController@register'));
Route::post('registerProses', ('AuthController@registerProses'));


Route::middleware(['login'])->group(function () {

    Route::middleware(['admin'])->group(function () {
        //dashboard
        Route::resource('admin/home', ('Admin\HomeController'));
        Route::resource('admin/tambah-admin', ('Admin\TambahAdminController'));
        Route::resource('admin/data-buku', ('Admin\DataBukuController'));
        Route::resource('admin/pinjam-buku', ('Admin\PinjamBukuController'));
    });

    Route::middleware(['guest'])->group(function () {
        //dashboard
        Route::resource('guest/home', ('Guest\HomeController'));
        Route::resource('guest/pinjam-buku', ('Guest\PinjamBukuController'));
    });
});
