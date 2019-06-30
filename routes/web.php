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

Route::get('add','AddController@index');

//Main Route
    //Film Route
        Route::get('main_film','FilmController@index');
    //Studio Route
        Route::get('main_studio','StudioController@index');

// Route
    //Add Data
        //Film
            Route::post('main_film/film_storedata','FilmController@film_storedata');
        //Studio
            Route::post('main_studio/studio_storedata','StudioController@studio_storedata');
    //Edit Data
        //Film
            Route::get('main_film/film_edit/{id}','FilmController@film_edit');
            Route::post('main_film/film_update','FilmController@film_update');
        //Studio
            Route::get('main_studio/studio_edit/{id}','StudioController@studio_edit');
            Route::post('main_studio/studio_update','StudioController@studio_update');
    //Hapus Data
        //Film
            Route::get('main_film/film_delete/{id}','FilmController@film_delete');
        //Studio
            Route::get('main_studio/studio_delete/{id}','StudioController@studio_delete');
    //Image Data

//Studio Route
