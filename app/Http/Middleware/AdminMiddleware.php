<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // this is function exists from beginning in this class when we create it by php artisan make:middleware AdminMiddleware
    // we have to add this middleware to Requests/kernel.php in line 53
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role != User::ADMIN){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
