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

Route::get('/', function () {
    return view('welcome');
});

Route::get('testlogin', function() {
    return view('welcome_login');
});

Route::get('/add','AddController@index');

//Main Route
    //Film Route
        Route::get('/main_film','FilmController@index');
    //Studio Route
        Route::get('/main_studio','StudioController@index');
    //Kursi Route
        Route::get('/main_kursi', 'KursiController@index');
    //Kategori Route
        Route::get('/main_kategori', 'KategoriController@index');

// Route
    //Add Data
        //Film
            Route::get('/main_film/film_add', function (){
                return view('main_film_add');
            });
            Route::post('/main_film/film_storedata','FilmController@film_storedata');
        //Studio
            Route::get('/main_studio/studio_add', function(){
                return view('main_studio_add');
            });
            Route::post('/main_studio/studio_storedata','StudioController@studio_storedata');
        //Kursi
            Route::get('/main_kursi/kursi_add', function(){
                return view('main_kursi_add');
            });
            Route::post('/main_kursi/kursi_storedata','KursiController@kursi_storedata');
        //Kategori
            Route::get('/main_kategori/kategori_add', function(){
                return view('main_kategori_add');
            });
            Route::post('/main_kategori/kategori_storedata','KategoriController@kategori_storedata');
//Edit Data
        //Film
            Route::get('/main_film/film_edit/{id}','FilmController@film_edit');
            Route::post('/main_film/film_update','FilmController@film_update');
        //Studio
            Route::get('/main_studio/studio_edit/{id}','StudioController@studio_edit');
            Route::post('/main_studio/studio_update','StudioController@studio_update');
        //Kursi
            Route::get('/main_kursi/kursi_edit/{id}','KursiController@kursi_edit');
            Route::post('/main_kursi/kursi_update','KursiController@kursi_update');
        //Kategori
            Route::get('/main_kategori/kategori_edit/{id}','KategoriController@kategori_edit');
            Route::post('/main_kategori/kategori_update','KategoriController@kategori_update');
    //Hapus Data
        //Film
            Route::get('/main_film/film_delete/{id}','FilmController@film_delete');
        //Studio
            Route::get('/main_studio/studio_delete/{id}','StudioController@studio_delete');
        //Kursi
            Route::get('/main_kursi/kursi_delete/{id}','KursiController@kursi_delete');
        //Kategori
            Route::get('/main_kategori/kategori_delete/{id}','KategoriController@Kategori_delete');

//Image Data

//Studio Route

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
