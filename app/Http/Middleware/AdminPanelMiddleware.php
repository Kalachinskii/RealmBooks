<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPanelMiddleware
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
        // auth() - хелпер всегда возвращает пользовотеля который заходит на сайт 
        // (речь о вас и вашем ПК, на других ПК их пользовотеля)
        // dd(auth()->user()->login);
        if (!auth()->user()->role) {
            return redirect()->route('home');
        } else {
            return $next($request);
        }
    }
}
