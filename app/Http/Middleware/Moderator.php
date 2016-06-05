<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Moderator
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


      if ( Auth::check() && Auth::user()->getTip()==1)
     {
          return $next($request);
     }

     return redirect('welcome');
    }



}
