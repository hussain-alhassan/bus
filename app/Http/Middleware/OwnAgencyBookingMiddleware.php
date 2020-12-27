<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnAgencyBookingMiddleware
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
        $agency_id = Auth::user()->agencies()->first()->id;
        $requestedBooking = $request->route('booking');

        if($requestedBooking->trip->agency_id === $agency_id) return $next($request);

        abort(403);

    }
}
