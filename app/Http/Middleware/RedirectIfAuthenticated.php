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
            return redirect(RouteServiceProvider::HOME);
        }
        /*
         * Session::put('oldurl',$request->url());
         * if($request->ajax() || $request->wantsJson()){
         *     return response('Unauthirized',401);
         *}else{
         *     return redirect()->route('login');
         * } 
        */
        /**
         * in login func add 
         * $oldurl = Session::get('oldurl');
         * to redirect path
        */
        return $next($request);
    }
}
