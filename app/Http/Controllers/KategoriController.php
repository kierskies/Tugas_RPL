<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    //View Route
    public function index(Request $request)
    {
        $kategori = null;
        if ($request->cari != null) {
            $kategori = DB::table('kategori')->where('judul', 'LIKE', "%$request->cari%")->get();
        } else {
            //Ambil data dari tabel
            $kategori = DB::table('kategori')->get();
        }
        //Mengirim data ke view model
        return view('admin.main_kategori', ['kategori' => $kategori]);
    }

    //Add Route
    public function kategori_storedata(Request $request){
        //nyimpen data dari inputan ke database
        DB::table('kategori')->insert([
            'id_kategori' => $request->idkategori,
            'nama_kategori' => $request->nama_kategori
        ]);
        //kembali ke menu utama
        return redirect('admin/main_kategori');
    }

    //Edit Route
    public function kategori_edit($idkategori){
        //Ngambil data film dari ID
        $kategori = DB::table('kategori')->where('id_kategori',$idkategori)->get();
        //Mindahin data film ke view model
        return view('admin.main_kategori_edit', ['kategori' => $kategori]);
    }

    //Update Route
    public function kategori_update(Request $request){
        //update database dengan data baru
        DB::table('kategori')->where('id_kategori',$request->idkategori)->update([
            'judul' => $request->judul
        ]);
        //kembali ke menu utama
        return redirect('admin/main_kategori');
    }

    //Delete Route
    public function kategori_delete($idkategori){
        //menghapus data berdasarkan ID
        DB::table('kategori')->where('id_kategori',$idkategori)->delete();
        //kembali ke view model
        return redirect('admin/main_kategori');
    }
}
