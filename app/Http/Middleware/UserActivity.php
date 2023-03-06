<?php

namespace App\Http\Middleware;

use App\Models\Petugas;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserActivity
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
        if (auth()->check()) {
            auth()->user()->update(['last_seen' => now()]);
        }
        return $next($request);
    }
}
