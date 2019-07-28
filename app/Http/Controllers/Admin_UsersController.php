<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_UsersController extends Controller
{
    //View Route
    public function index(Request $request)
    {
        $users = null;
        if ($request->cari != null) {
            $users = DB::table('users')->where('name', 'LIKE', "%$request->cari%")->get();
        } else {
            //Ambil data dari tabel
            $users = DB::table('users')->get();
        }
        //Mengirim data ke view model
        return view('admin.main_users', ['users' => $users]);
    }

    //Delete Route
    public function users_delete($id)
    {
        //menghapus data berdasarkan ID
        DB::table('users')->where('id', $id)->delete();
        //kembali ke view model
        return redirect('/admin/main_users');
    }
}
