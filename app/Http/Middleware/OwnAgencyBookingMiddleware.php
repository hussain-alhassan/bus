<?php

namespace App\Http\Middleware;

use App\Office;
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
        $agency_id = DB::table('agency_user')->where('user_id', Auth::id())->first()->agency_id;
        $offices = Office::select('id')->where('agency_id', $agency_id)->get()->pluck('id');
        $requestedBooking = $request->route('booking');

        if(in_array($requestedBooking->office_id, $offices->all())) return $next($request);

        abort(404);

    }
}
