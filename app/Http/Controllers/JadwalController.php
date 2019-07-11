<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    //View Route
    public function index(){
        //Ambil data dari tabel
        $jadwal = DB::table('jadwal')->get();

        //Mengirim data ke view model
        return view('main_jadwal',['jadwal' => $jadwal ]);
    }

    //Add Route
    public function kategori_storedata(Request $request){
        //nyimpen data dari inputan ke database
        DB::table('kategori')->insert([
            'id_kategori' => $request->id_jadwal,
            'id_film' => $request->id_film,
            'id_studio' => $request->id_studio,
            'jam_tayang' => $request->jam_tayang,
            'tanggal' => $request->tanggal
        ]);
        //kembali ke menu utama
        return redirect('main_kategori');
    }

    //Edit Route
    public function kategori_edit($idkategori){
        //Ngambil data film dari ID
        $kategori = DB::table('kategori')->where('id_kategori',$idkategori)->get();
        //Mindahin data film ke view model
        return view('main_kategori_edit',['kategori' => $kategori]);
    }

    //Update Route
    public function kategori_update(Request $request){
        //update database dengan data baru
        DB::table('kategori')->where('id_kategori',$request->idkategori)->update([
            'judul' => $request->judul
        ]);
        //kembali ke menu utama
        return redirect('main_kategori');
    }

    //Delete Route
    public function kategori_delete($idkategori){
        //menghapus data berdasarkan ID
        DB::table('kategori')->where('id_kategori',$idkategori)->delete();
        //kembali ke view model
        return redirect('main_kategori');
    }
}
