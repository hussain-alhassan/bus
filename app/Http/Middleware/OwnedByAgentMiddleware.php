<?php

namespace App\Http\Middleware;

use App\Bus;
use App\Trip;
use Closure;
use Illuminate\Support\Facades\Auth;

class OwnedByAgentMiddleware
{
    public function handle($request, Closure $next)
    {
        $authAgencyID = Auth::user()->agencies()->first()->id;

        if ($bus = $request->route('bus')) {
            // if method === 'PUT', means $bus = the bus id only not the whole model
            if ($request->method() === 'PUT') $bus = Bus::findOrFail($bus);
            if($bus->agency_id === $authAgencyID) return $next($request);
        } elseif ($trip = $request->route('trip')) {
            if ($request->method() === 'PUT') $trip = Trip::findOrFail($trip);
            if ($trip->agency_id === $authAgencyID) return $next($request);
        }

        abort(403);
    }
}
