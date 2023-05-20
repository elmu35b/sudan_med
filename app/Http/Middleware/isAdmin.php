<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->type == 'admin'){
            // return 'hi';
            logger('admin Login');
            return $next($request);
        }else {
            // logger('fuck');
            return redirect()->route('dash.home');
        }
    }
}
