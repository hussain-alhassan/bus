<?php

namespace App\Http\Middleware;

use Closure;

class OwnOfficeMiddleware
{
    public function handle($request, Closure $next)
    {
        $autAgencyID = auth()->user()->agencies()->first()->id;
        $office = $request->route('office');
        if($office->agency_id === $autAgencyID) return $next($request);

        abort(404);
    }
}
