<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    //View Route
    public function index()
    {
        //Ambil data dari tabel
        $jadwal = DB::table('jadwal')
            ->join('film', 'jadwal.id_film', '=', 'film.id_film')
            ->join('studio', 'jadwal.id_studio', '=', 'studio.id_studio')
            ->select('jadwal.*', 'film.judul', 'studio.no_studio')
            ->get();
        //Mengirim data ke view model
        return view('admin.main_jadwal', ['jadwal' => $jadwal]);
    }

    //Add Route
    public function jadwal_storedata(Request $request)
    {
        //nyimpen data dari inputan ke database
        DB::table('jadwal')->insert([
            'id_jadwal' => $request->id_jadwal,
            'id_film' => $request->id_film,
            'id_studio' => $request->id_studio,
            'jam_tayang' => $request->jam_tayang,
            'tanggal' => $request->tanggal
        ]);
        //kembali ke menu utama
        return redirect('admin/main_jadwal');
    }

    //Edit Route
    public function jadwal_edit($id_jadwal)
    {
        //Ngambil data film dari ID
        $film = DB::table('film')->get();
        $studio = DB::table('studio')->get();

        $jadwal = DB::table('jadwal')->where('id_jadwal', $id_jadwal)->get();
        //Mindahin data film ke view model
        return view('admin.main_jadwal_edit', compact('jadwal', 'studio', 'film'));
    }

    //Update Route
    public function kategori_update(Request $request)
    {
        //update database dengan data baru
        DB::table('kategori')->where('id_kategori', $request->idkategori)->update([
            'judul' => $request->judul
        ]);
        //kembali ke menu utama
        return redirect('main_kategori');
    }

    //Delete Route
    public function kategori_delete($idkategori)
    {
        //menghapus data berdasarkan ID
        DB::table('kategori')->where('id_kategori', $idkategori)->delete();
        //kembali ke view model
        return redirect('main_kategori');
    }
}
