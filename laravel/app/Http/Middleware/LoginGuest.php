<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LoginGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('role') != '2') {
            return redirect()->to('/')->with('gagal', 'Mohon Maaf Fitur ini hanya untuk Guest');
        }
        return $next($request);
    }
}
