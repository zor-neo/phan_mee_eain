<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::user()){   //when login
        //     if(Auth::user()->role == 'admin'){ //check role 'admin' or 'user'
        //         if($request->route()->getname() == 'login'  || $request->route()->getname() == 'register'){ // check route to decied not allow other route
        //             return back();
        //         }
        //         return $next($request); //login process
        //     }else{
        //         return back();
        // }
        // }else{ //
        //     return $next($request);
        // }

        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->isAdminRole()) {
            return $next($request);
        }

        return redirect()->route('userHome');

    }
}
