<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard = null)
    {
        if( $request->session()->has('ADMIN_LOGIN')){

        }else{
            $request->session()->flush('error','Access Denied');
            $request->session()->forget('username');
            $request->session()->forget('ADMIN_LOGIN');
            $request->session()->forget('admin_id');
           
            return redirect('admin');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('admin');
        }
        return $next($request);
       
    }
}
