<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->role == "CS") {
                return redirect()->route('cs.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == "KABID") {
                return redirect()->route('kabid.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == "KASI") {
                return redirect()->route('kasi.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == "PETUGAS") {
                return redirect()->route('petugas.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == "SUPERADMIN") {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == "SUPERADMIN") {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == "USER") {
                return redirect()->route('home');
            }
            // if (Auth::guard($guard)->check() && Auth::user()->role == "CS") {
            //     $this->redirectTo = route('cs.dashboard');
            // } elseif (Auth::guard($guard)->check() && Auth::user()->role == "KABID") {
            //     $this->redirectTo = route('kabid.dashboard');
            // } elseif (Auth::guard($guard)->check() && Auth::user()->role == "KASI") {
            //     $this->redirectTo = route('kasi.dashboard');
            // } elseif (Auth::guard($guard)->check() && Auth::user()->role == "PETUGAS") {
            //     $this->redirectTo = route('petugas.dashboard');
            // } elseif (Auth::guard($guard)->check() && Auth::user()->role == "SUPERADMIN") {
            //     $this->redirectTo = route('admin.dashboard');
            // } else {
            //     $this->redirectTo = route('home');
            // }
        }

        return $next($request);
    }
}