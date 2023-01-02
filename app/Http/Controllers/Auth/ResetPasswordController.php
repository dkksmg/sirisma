<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role == "CS") {
            $this->redirectTo = route('cs.dashboard');
        } elseif (Auth::check() && Auth::user()->role == "KABID") {
            $this->redirectTo = route('kabid.dashboard');
        } elseif (Auth::check() && Auth::user()->role == "KASI") {
            $this->redirectTo = route('kasi.dashboard');
        } elseif (Auth::check() && Auth::user()->role == "PETUGAS") {
            $this->redirectTo = route('petugas.dashboard');
        } elseif (Auth::check() && Auth::user()->role == "SUPERADMIN") {
            $this->redirectTo = route('admin.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }
}