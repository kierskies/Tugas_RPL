<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    //View Route
    public function index(Request $request)
    {
        $pemesanan = null;
        if ($request->cari != null) {
            $pemesanan = DB::table('pemesanan')
                ->join('users', 'pemesanan.id', '=', 'users.id')
                ->join('jadwal', 'pemesanan.id_jadwal', '=', 'jadwal.id_jadwal')
                ->select('id_pemesanan', 'name', 'tanggal', 'total_pembayaran', 'status')
                ->where('name', 'LIKE', "%$request->cari%")->get();
        } else {
            //Ambil data dari tabel
            $pemesanan = DB::table('pemesanan')
                ->join('users', 'pemesanan.id', '=', 'users.id')
                ->join('jadwal', 'pemesanan.id_jadwal', '=', 'jadwal.id_jadwal')
                ->select('id_pemesanan', 'name', 'tanggal', 'total_pembayaran', 'status')
                ->get();
        }
        //Mengirim data ke view model
        return view('petugas.main_petugas', ['pemesanan' => $pemesanan]);
    }

    public function petugas_konfirmasi($id)
    {
        //menghapus data berdasarkan ID
        DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update(['status' => 'Confirmed']);
        //kembali ke view model
        return redirect('/petugas/main_petugas');
    }
}
