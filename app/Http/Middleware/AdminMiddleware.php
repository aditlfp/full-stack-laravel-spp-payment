<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
            if (Auth::user()->level_id === 1 && Auth::user()->username === 'Admin')
            {
                
                return $next($request);   

            } 

            else 
            
            {                
                session()->flush();
                toastr()->error('Oops! Something went wrong!');
                return redirect()->to(url('/'));
                
            }    
        
    }
}
