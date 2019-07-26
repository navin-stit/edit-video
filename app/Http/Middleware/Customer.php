<?php

namespace App\Http\Middleware;
use Auth; 
use Closure;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
          public function getUserData()
       {
         return $this->hasOne(User::class, 'id' , 'user_id');
        }
 
}
