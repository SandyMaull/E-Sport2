<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckVerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::guard($guard)->user()->verified === 'yes') {
                return $next($request);
            }
            else {
                Auth::guard($guard)->logout();
                // return redirect(route('anggota.loginpost'))->with('error', 'User Belum Terverifikasi!');
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error','User Belum Terverifikasi!');
            }
        }
        return redirect(route('anggota.loginpost'));
    }
}
