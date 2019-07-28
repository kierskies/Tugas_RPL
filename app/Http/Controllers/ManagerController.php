<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    //View Route
    public function index(Request $request)
    {
        $pemesanan = null;
        if ($request->cari != null) {
            $pemesanan = DB::table('pemesanan')
                ->join('users', 'pemesanan.id', '=', 'users.id')
                ->join('jadwal', 'pemesanan.id_jadwal', '=', 'jadwal.id_jadwal')
                ->select('id_pemesanan', 'name', 'tanggal', 'total_pembayaran')
                ->where('name', 'LIKE', "%$request->cari%")->get();
        } else {
            //Ambil data dari tabel
            $pemesanan = DB::table('pemesanan')
                ->join('users', 'pemesanan.id', '=', 'users.id')
                ->join('jadwal', 'pemesanan.id_jadwal', '=', 'jadwal.id_jadwal')
                ->select('id_pemesanan', 'name', 'tanggal', 'total_pembayaran')
                ->where('status', '=', 'Confirmed')
                ->get();
        }
        //Mengirim data ke view model
        return view('manager.main_manager', ['pemesanan' => $pemesanan]);
    }
}
