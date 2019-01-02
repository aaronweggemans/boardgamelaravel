<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
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
        //If the user is logged in
        if(Auth::check())
        {
            //There is an check if user is admin and will redirect
            if(Auth::user()->role == "admin")
            {
                return redirect('/');
            }
            //Check for user
            elseif (Auth::user()->role == "user")
            {
                return redirect('/');
            }
            //Else go futher with the action
            else {
                return $next($request);
            }
        }
        //If user is not logged in it will redirect to auth
        else
        {
            return redirect('/auth');
        }
    }
}
