<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);

        return redirect('/sign');

        // if(Auth::check())
        // {

        //     if(Auth::user()->role_as == '1')//0- user 1-admin
        //     {
        //         return $next($request);
        //     }
        //     else
        //     {
        //         return redirect('/home')->with('status', 'Acess Denied');
        //     }
        // }
        // else
        //     {
        //         return redirect()->with('status', 'Login First');
        //     }
    }
}
