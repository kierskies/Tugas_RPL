<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KursiController extends Controller
{
    //View Route
    public function index(Request $request)
    {
        $kursi = null;
        if ($request->cari != null) {
            $kursi = DB::table('kursi')->where('status_kursi', 'LIKE', "%$request->cari%")->get();
        } else {
            //Ambil data dari tabel
            $kursi = DB::table('kursi')->get();
        }
        //Mengirim data ke view model
        return view('admin.main_kursi', ['kursi' => $kursi]);
    }

    //Add Route
    public function kursi_storedata(Request $request){
        //nyimpen data dari inputan ke database
        DB::table('kursi')->insert([
            'id_kursi' => $request->idkursi,
            'no_kursi' => $request->nokursi,
            'status_kursi' => $request->status_kursi
        ]);
        //kembali ke menu utama
        return redirect('admin/main_kursi');
    }

    //Edit Route
    public function kursi_edit($idkursi){
        //Ngambil data film dari ID
        $kursi = DB::table('kursi')->where('id_kursi',$idkursi)->get();
        //Mindahin data film ke view model
        return view('admin.main_kursi_edit', ['kursi' => $kursi]);
    }

    //Update Route
    public function kursi_update(Request $request){
        //update database dengan data baru
        DB::table('kursi')->where('id_kursi',$request->idkursi)->update([
            'no_kursi' => $request->nokursi
        ]);
        //kembali ke menu utama
        return redirect('admin/main_kursi');
    }

    //Delete Route
    public function kursi_delete($idkursi){
        //menghapus data berdasarkan ID
        DB::table('kursi')->where('id_kursi',$idkursi)->delete();
        //kembali ke view model
        return redirect('admin/main_kursi');
    }
}
