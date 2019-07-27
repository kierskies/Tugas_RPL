<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    //View Route
    public function index(){
        //Ambil data dari tabel

        $pemesanan = DB::table('pemesanan')
            ->join('jadwal', 'jadwal.id_jadwal', '=', 'pemesanan.id_jadwal')
            ->join('users', 'users.id', '=', 'pemesanan.id')
            ->select('pemesanan.*', 'jadwal.*', 'users.name')
            ->get();

        //Mengirim data ke view model
        return view('pemesanan.main_pemesanan', ['pemesanan' => $pemesanan]);
    }

    //Add Route
    public function film_storedata(Request $request){
        //nyimpen data dari inputan ke database
        DB::table('pemesanan')->insert([
            'id_pemesanan' => $request->id_pemesanan,
            'id_film' => $request->id_film,
            'id_kursi' => $request->id_kursi,
            'jam_tayang' => $request->jam_tayang,
            'tanggal' => $request->tanggal,
            'total_bayar' => $request->total_bayar
        ]);
        //kembali ke menu utama
        return redirect('pemesanan/main_pemesanan');
    }

    //Edit Route
    public function film_edit($id){
        //Ngambil data film dari ID
        $film = DB::table('film')->where('id_film',$id)->get();
        //Mindahin data film ke view model
        return view('admin/main_film_edit',['film' => $film]);
    }

    //Update Route
    public function film_update(Request $request){
        //update database dengan data baru
        DB::table('film')->where('id_film',$request->id)->update([
            'judul' => $request->namafilm,
            'sinopsis' => $request->sinopsis,
            'poster_film' => $request->poster
        ]);
        //kembali ke menu utama
        return redirect('admin/main_film');
    }

    //Delete Route
    public function film_delete($id){
        //menghapus data berdasarkan ID
        DB::table('film')->where('id_film',$id)->delete();
        //kembali ke view model
        return redirect('admin/main_film');
    }

    //Image Route
}
