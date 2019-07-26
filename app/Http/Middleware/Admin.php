<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//   function handle($request, Closure $next)
//{
//    if (Auth::check() && Auth::user()->role_id == '3') {
//        return 'admin/dashboard';
//    }
//    elseif (Auth::check() && Auth::user()->role == '2') {
//        return redirect('/employee/dashboard');
//    }
//    else {
//        return redirect('/get-started');
//    }
//}
}
