<?php

namespace App\Http\Middleware;

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
   public function handle($request, Closure $next)
    {
        // echo "user role = ".$role_s = \Session::get('role')." ".$const = \Config::get('constants.ROLE_ADMIN');
        if(\Session::get('role') == \Config::get('constants.ROLE_ADMIN')){
          return $next($request);  
        }else{
            return redirect('/home')->with('error_admin','No Admin Access');
        }
        
    }
}
