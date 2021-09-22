<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has('Loggeduser') && ($request->path()!='auth/login' && $request->path()!='auth/register')){
            return redirect('auth/login')->with('fail','You must be logged in');
        }

        if(session()->has('Loggeduser') && ($request->path()=='auth/login' || $request->path()=='auth/register')){
            return back();
        }
 
        return $next($request)->withHeaders([
            "Pragma" => "no-cache",
            "Expires" => "Fri, 01 Jan 1990 00:00:00 GMT",
            "Cache-Control" => "no-cache, must-revalidate, no-store, max-age=0, private",]);
    }
}
