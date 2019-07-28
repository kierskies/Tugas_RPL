<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = 'admin/main_film';

    public function redirectTo()
    {

        // User role
        $userid = Auth::id();

        // Check user role
        switch ($userid) {
            case '1': //Admin
                return '/admin/main_film';
                break;
            case '2': //Manager
                return '/manager/main_manager';
                break;
            case '3': //Petugas
                return '/petugas/main_petugas';
                break;
            default:
                return '/pemesanan/main_pemesanan';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
