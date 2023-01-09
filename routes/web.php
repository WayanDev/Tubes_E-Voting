<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/', function() {
    return redirect('/login');
});

Route::group(['middleware' => ['auth' => 'CekRole:admin']], function() {

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/tabelPaslon', 'AdminController@tabelPaslon')->name('tabelPaslon');
    Route::get('/tabelAkun', 'AdminController@tabelAkun')->name('tabelAkun');
    Route::get('/hapus/{id}', 'AdminController@hapus');
    Route::get('/tambah', 'AdminController@viewTambah');
    Route::post('/proses_tambah', 'AdminController@prosesTambah');
    Route::get('/edit/{id}', 'AdminController@edit');
    Route::put('/proses_edit/{id}', 'AdminController@prosesEdit');
    Route::get('/voteSelesai', 'AdminController@voteSelesai');
    Route::get('/registerPemilih', 'AdminController@registerPemilih');
    Route::post('/prosesRegisterPemilih', 'AdminController@prosesRegisterPemilih');
    Route::get('/detailPaslon/{id}', 'AdminController@detail');
    Route::get('/user/importPemilih', 'AdminController@importPemilih');
    Route::post('/user/import_excel', 'AdminController@importExcel');

});

Route::group(['middleware' => ['auth' => 'CekRole:admin']], function() {

   Route::get('/hasilVote', 'AdminController@hasilVote');
});

Auth::routes();

Route::group(['middleware' => ['auth' => 'CekRole:Pemilih']], function() {
    Route::get('/home', 'PemilihController@index')->name('home');
    Route::get('/detail/{id}', 'PemilihController@detail');
    Route::get('/pilihPaslon/{id}', 'PemilihController@pilihPaslon');

}); 
