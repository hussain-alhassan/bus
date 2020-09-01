<?php

namespace App\Http\Controllers\traveler;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\FindTripsRequest;
use App\Trip;
use Carbon\Carbon;

class TripController extends Controller
{
    /**
     * Search for available trips
     * @param FindTripsRequest $request
     * @return mixed
     * @throws \Exception
     */
    public function search(FindTripsRequest $request)
    {
        $city_from = City::where('is_active', 1)->findOrFail($request->from);
        $city_to = City::where('is_active', 1)->findOrFail($request->to);
        $departDate =  new Carbon($request->depart);
        $returnDate = $request->return ? clone new Carbon($request->return) : '-';

        $searchInputs = [
            'from' => $city_from,
            'to' => $city_to,
            'depart' => $departDate,
            'return' => $returnDate,
            'seats' => $request->seats,
        ];

        $departFlexibleDate = $departDate->copy()->addWeeks(1);

        $availableTrips = Trip::whereBetween('depart', [
            $request->depart,
            $departFlexibleDate->format('Y-m-d')
        ])
            ->where('from_city_id', $request->from)
            ->where('to_city_id', $request->to)
            ->get();

        return view('available-trips', compact('searchInputs', 'availableTrips'));
    }

    /**
     * Show user trips (upcoming & history of trips)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        // DB mock //
        // user has trips
        $trips = [
            [
                'id' => 1,
                'from' => 'Al ahsa',
                'to' => 'Dubai',
                'depart' => Carbon::yesterday(),
                'return' => 'some return date',
                'agency_id' => 6,
                'seats' => 1,
            ],
            [
                'id' => 2,
                'from' => 'Dammam',
                'to' => 'Dubai',
                'depart' => Carbon::tomorrow(),
                'return' => null,
                'agency_id' => 2,
                'seats' => 2,
            ],
            [
                'id' => 1,
                'from' => 'Al ahsa',
                'to' => 'Dubai',
                'depart' => new Carbon('last month'),
                'return' => 'some return date',
                'agency_id' => 5,
                'seats' => 3,
            ],
            [
                'id' => 2,
                'from' => 'Dubai',
                'to' => 'Dammam',
                'depart' => new Carbon('next month'),
                'return' => null,
                'agency_id' => 1,
                'seats' => 4,
            ],
        ];

        $endOfToday = Carbon::today()->endOfDay();

        $upcomingTrips = [];
        $history = [];
        foreach ($trips as $trip) {
            if ($trip['depart'] > $endOfToday) {
                array_push($upcomingTrips, $trip);
            } else {
                array_push($history, $trip);
            }
        }

        return view('trips', compact('upcomingTrips', 'history'));
    }
}
