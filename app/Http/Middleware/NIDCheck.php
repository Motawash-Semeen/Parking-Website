<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NIDCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->path() !== 'store-nid') {
            // Perform the NID check only for routes other than /store-nid
            if (Auth::check() && strpos(Auth::user()->nid, "0-") !== false) {
                return redirect('/store-nid');
            }
        }
        else if($request->path() == 'store-nid'){
            if (Auth::check() && strpos(Auth::user()->nid, "0-") === false) {
                return redirect('/dashboard');
            }
        }

        return $next($request);
        
    }
}
