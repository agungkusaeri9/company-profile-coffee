<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'DashboardController')->name('dashboard');

    // pesan masuk
    Route::prefix('pesan-masuk')->group(function () {
        Route::get('/', 'PesanMasukController@index')->name('pesan-masuk.index');
        Route::delete('/{id}', 'PesanMasukController@destroy')->name('pesan-masuk.destroy');
    });

    // artikel
    Route::resource('artikel', 'ArtikelController')->except('show');

    // kategori-produk
    Route::resource('kategori-produk', 'KategoriProdukController')->except('show');

    // produk
    Route::resource('produk', 'ProdukController')->except('show');

    // banner
    Route::resource('banner', 'BannerController')->except('show');
});
