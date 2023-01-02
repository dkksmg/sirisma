<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::PERMOHONAN;
    protected $redirectTo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function redirectTo()
    {
        if (auth()->user()->role == 'CS') {
            return route('cs.dashboard');
        } else if (auth()->user()->role == 'KABID') {
            return route('kabid.dashboard');
        } else if (auth()->user()->role == 'KASI') {
            return route('kasi.dashboard');
        } else if (auth()->user()->role == 'PETUGAS') {
            return route('petugas.dashboard');
        } else if (auth()->user()->role == 'SUPERADMIN') {
            return route('admin.dashboard');
        } else {
            return route('permohonan.index');
        }
    }
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