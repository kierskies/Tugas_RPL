<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    //View Route
    public function index(Request $request)
    {
        $film = null;
        if ($request->cari != null) {
            $film = DB::table('film')
                ->join('kategori', 'film.id_kategori', '=', 'kategori.id_kategori')
                ->select('film.*', 'kategori.*')
                ->where('judul', 'LIKE', "%$request->cari%")->get();
        } else {
            //Ambil data dari tabel
            $film = DB::table('film')
                ->join('kategori', 'film.id_kategori', '=', 'kategori.id_kategori')
                ->select('film.*', 'kategori.*')
                ->get();
        }
        //Mengirim data ke view model
        return view('admin.main_film', ['film' => $film]);
    }

    //Add Route
    public function film_storedata(Request $request)
    {
        //nyimpen data dari inputan ke database
        DB::table('film')->insert([
            'id_film' => $request->id,
            'judul' => $request->namafilm,
            'sinopsis' => $request->sinopsis,
            'id_kategori' => $request->id_kategori,
            'poster_film' => $request->poster
        ]);
        //kembali ke menu utama
        return redirect('/admin/main_film');
    }

    //Edit Route
    public function film_edit($id)
    {
        //Ngambil data film dari ID
        $film = DB::table('film')->where('id_film', $id)->get();
        //Mindahin data film ke view model
        return view('admin.main_film_edit', ['film' => $film]);
    }

    //Update Route
    public function film_update(Request $request)
    {
        //update database dengan data baru
        DB::table('film')->where('id_film', $request->id)->update([
            'judul' => $request->namafilm,
            'sinopsis' => $request->sinopsis,
            'poster_film' => $request->poster
        ]);
        //kembali ke menu utama
        return redirect('/admin/main_film');
    }

    //Delete Route
    public function film_delete($id)
    {
        //menghapus data berdasarkan ID
        DB::table('film')->where('id_film', $id)->delete();
        //kembali ke view model
        return redirect('/admin/main_film');
    }
}
