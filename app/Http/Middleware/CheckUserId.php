<?php

namespace App\Http\Middleware;

use App\Models\ParkingSlots;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $optionalParameter = $request->route('slotid');
        if ($optionalParameter) {
            
            $urlUserId = ParkingSlots::find($optionalParameter)->user_id;
        } else {
            // Get the user ID from the URL parameters
            $urlId = $request->route('id');
            $urlUserId = ParkingSlots::find($urlId)->user_id;
        }

        // Get the logged-in user ID
        $loggedInUserId = Auth::id();

        // Check if the logged-in user ID matches the URL user ID
        if ($urlUserId != $loggedInUserId) {
            return redirect('/');
        }

        return $next($request);
    }
}
