<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HttpRequest;

class MasterAuth
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

        if(Cookie::has('access')  || session::has('access') || isset($request->key)){
            if(isset($request->key)){
                $key = $request->key;
            }else{
                if(Cookie::has('access')){
                    $key =  Cookie::get('access');
                    Session::put('access',$key);
                    Cookie::queue('access',cookie::get('access'),60*24*30);
                }else{
                    $key = Session::get('access');
                }
            }
            $http = new HttpRequest();
            $check  = $http->UserDetail($key);
            if(!$check){
                Session::forget('access');
                Cookie::queue('access','',-1);
                return redirect()->route('show-login');
            }

        }else{
            return redirect()->route('show-login');
        }
            return $next($request);



    }
}
