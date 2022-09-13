<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo()
    {
        if (auth()->user()->role == 'CS') {
            return route('dashboard-cs');
        } else if (auth()->user()->role == 'KABID') {
            return route('dashboard-kabid');
        } else if (auth()->user()->role == 'KASI') {
            return route('dashboard-kasi');
        } else if (auth()->user()->role == 'PETUGAS') {
            return route('dashboard-petugas');
        } else if (auth()->user()->role == 'SUPERADMIN') {
            return route('dashboard-admin');
        } else {
            return route('permohonan.index');
        }
    }
}