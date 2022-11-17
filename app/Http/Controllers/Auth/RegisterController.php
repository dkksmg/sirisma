<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha' => ['required', 'captcha']
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.max' => 'Nama Lengkap berisi maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus merupakan alamat email yang valid',
            'email.max' => 'Email berisi maksimal 255 karakter',
            'email.unique' => 'Email ini sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password berisi minimal 8 karakter',
            'password.confirmed' => 'Password Konfirmasi tidak cocok',
            'captcha.required' => 'Captcha wajib diisi',
            'captcha.captcha' => 'Captcha tidak cocok',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => Captcha::img('flat')]);
    }
}