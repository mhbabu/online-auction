<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->user_type == '1x101'){
                return redirect('/admin/dashboard');
            }elseif(auth()->user()->user_type == '2x202'){
                return redirect('/dashboard');
            }else{
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
