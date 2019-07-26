<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role='')
    {
        $userRole = $request->user();
 
        if($userRole && $userRole->count() > 0)
        {
            $userRole = $userRole->role;
            $checkRole = 0;
            if($userRole == $role && $role =='admin')
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role == 'manager')
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role == 'employee')
            {
                $checkRole = 1;
            }
            
            if($checkRole == 1)
                return $next($request);
            else
               return abort(401);
        }
        else
        {
            return redirect('login');
        }
    }
}

