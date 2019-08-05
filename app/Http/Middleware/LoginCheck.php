<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\HttpRequest;
use Illuminate\Support\Facades\Session;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(cookie::has('access') || Session::has('access')){
            if(cookie::has('access')){
                $key = cookie::get('access');
                Session::put('access',$key);
                Cookie::queue('access',cookie::get('access'),60*24*30);
            }else{
                $key = Session::get('access');
            }

             $http  = new  HttpRequest();
             $check =  $http->UserDetail($key);

             if($check){
                    return redirect()->route('dashboard');
             }
        }
        return $next($request);

    }
}
