<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
USE Illuminate\Support\Facades\Auth;
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

Route::get('testlogin', function() {
    return view('welcome_login');
});

Route::get('/add','AddController@index');

//Main Route

//Film Route
Route::get('admin/main_film', 'FilmController@index');
//Studio Route
Route::get('admin/main_studio', 'StudioController@index');
//Kursi Route
Route::get('admin/main_kursi', 'KursiController@index');
//Kategori Route
Route::get('admin/main_kategori', 'KategoriController@index');
//Jadwal Route
Route::get('admin/main_jadwal', 'JadwalController@index');
//Users Route
Route::get('admin/main_users', 'Admin_UsersController@index');

//Pemesanan
Route::get('pemesanan/main_pemesanan', 'PemesananController@index');

//Manager
Route::get('manager/main_manager', 'ManagerController@index');

//Petugas
Route::get('petugas/main_petugas', 'PetugasController@index');

// Route

//Add Data

//Film
Route::get('admin/main_film/film_add', function () {
    $kategori = DB::table('kategori')->get();
    return view('admin/main_film_add', compact('kategori'));
});
Route::post('admin/main_film/film_storedata', 'FilmController@film_storedata');
//Studio
Route::get('admin/main_studio/studio_add', function () {
    return view('admin/main_studio_add');
});
Route::post('admin/main_studio/studio_storedata', 'StudioController@studio_storedata');
//Kursi
Route::get('admin/main_kursi/kursi_add', function () {
    return view('admin/main_kursi_add');
});
Route::post('admin/main_kursi/kursi_storedata', 'KursiController@kursi_storedata');
//Kategori
Route::get('admin/main_kategori/kategori_add', function () {
    return view('admin/main_kategori_add');
});
Route::post('admin/main_kategori/kategori_storedata', 'KategoriController@kategori_storedata');
//Jadwal
Route::get('admin/main_jadwal/jadwal_add', function () {
    $film = DB::table('film')->get();
    $studio = DB::table('studio')->get();
    return view('admin/main_jadwal_add', compact('studio', 'film'));
});
Route::post('admin/main_jadwal/jadwal_storedata', 'JadwalController@jadwal_storedata');


//Pemesanan
Route::get('pemesanan/main_pemesanan/pemesanan_add', function () {
    $jadwal = DB::table('jadwal')
        ->join('film', 'jadwal.id_film', '=', 'film.id_film')
        ->select('jadwal.*', 'film.judul')
        ->get();

    $kursi = DB::table('kursi')->get();
    return view('pemesanan/main_pemesanan_add', compact('jadwal', 'kursi'));
});
Route::post('pemesanan/main_pemesanan/pemesanan_storedata', 'PemesananController@pemesanan_storedata');


//Edit Data

//Film
Route::get('admin/main_film/film_edit/{id}', 'FilmController@film_edit');
Route::post('admin/main_film/film_update', 'FilmController@film_update');
//Studio
Route::get('admin/main_studio/studio_edit/{id}', 'StudioController@studio_edit');
Route::post('admin/main_studio/studio_update', 'StudioController@studio_update');
//Kursi
Route::get('admin/main_kursi/kursi_edit/{id}', 'KursiController@kursi_edit');
Route::post('admin/main_kursi/kursi_update', 'KursiController@kursi_update');
//Kategori
Route::get('admin/main_kategori/kategori_edit/{id}', 'KategoriController@kategori_edit');
Route::post('admin/main_kategori/kategori_update', 'KategoriController@kategori_update');
//Jadwal
Route::get('admin/main_jadwal/jadwal_edit/{id}', 'JadwalController@jadwal_edit');
Route::post('admin/main_jadwal/jadwal_update', 'JadwalController@jadwal_update');

//Hapus Data
//Film
Route::get('admin/main_film/film_delete/{id}', 'FilmController@film_delete');
//Studio
Route::get('admin/main_studio/studio_delete/{id}', 'StudioController@studio_delete');
//Kursi
Route::get('admin/main_kursi/kursi_delete/{id}', 'KursiController@kursi_delete');
//Kategori
Route::get('admin/main_kategori/kategori_delete/{id}', 'KategoriController@Kategori_delete');
//Jadwal
Route::get('admin/main_jadwal/jadwal_delete/{id}', 'JadwalController@Jadwal_delete');
//Users
Route::get('admin/main_users/users_delete/{id}', 'Admin_UsersController@users_delete');

//Cari

//Film
Route::get('admin/main_film/film_cari', 'FilmController@film_cari');


//Konfirmasi Petugas
Route::get('petugas/main_petugas/petugas_konfirmasi/{id}', 'PetugasController@petugas_konfirmasi');

//Image Data

//Studio Route

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
