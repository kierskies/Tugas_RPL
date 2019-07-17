<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudioController extends Controller
{
    //View Route
    public function index(){
        //Ambil data dari tabel
        $studio = DB::table('studio')->get();

        //Mengirim data ke view model
        return view('admin/main_studio',['studio' => $studio ]);
    }

    //Add Route
    public function studio_storedata(Request $request){
        //nyimpen data dari inputan ke database
        DB::table('studio')->insert([
            'id_studio' => $request->idstudio,
            'no_studio' => $request->nostudio
        ]);
        //kembali ke menu utama
        return redirect('admin/main_studio');
    }

    //Edit Route
    public function studio_edit($idstudio){
        //Ngambil data film dari ID
        $studio = DB::table('studio')->where('id_studio',$idstudio)->get();
        //Mindahin data film ke view model
        return view('admin/main_studio_edit',['studio' => $studio]);
    }

    //Update Route
    public function studio_update(Request $request){
        //update database dengan data baru
        DB::table('studio')->where('id_studio',$request->idstudio)->update([
            'no_studio' => $request->nostudio
        ]);
        //kembali ke menu utama
        return redirect('admin/main_studio');
    }

    //Delete Route
    public function studio_delete($idstudio){
        //menghapus data berdasarkan ID
        DB::table('studio')->where('id_studio',$idstudio)->delete();
        //kembali ke view model
        return redirect('admin/main_studio');
    }

    //Image Route
}
