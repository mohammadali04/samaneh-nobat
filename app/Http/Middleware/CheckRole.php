<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_role=auth()->user()->role()->first()->id;
        if(auth()->check() && $user_role==1 | $user_role==2){
            return $next($request);
        }else{
            return redirect()->back();
        }
       
    }
}
