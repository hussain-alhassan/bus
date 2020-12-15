<?php

namespace App\Http\Controllers\traveler;

use App\Booking;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\FindTripsRequest;
use App\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class TripController extends Controller
{
    /**
     * Search for available trips
     * @param FindTripsRequest $request
     * @return mixed
     * @throws \Exception
     */
    public function depart(FindTripsRequest $request)
    {
        $searchInputs = $this->getSearchInputs($request);

//        $departFlexibleDate = (new Carbon($request->depart))->copy()->addWeeks(1);

//        $availableTrips = Trip::whereBetween('depart', [
//            $request->depart,
//            $departFlexibleDate->format('Y-m-d')
//        ])

        $availableTrips = Trip::whereDate('depart', $request->depart)
            ->where('from_city_id', $request->from)
            ->where('to_city_id', $request->to)
            ->get();

        return view('traveler.depart-trips', compact('searchInputs', 'availableTrips'));
    }

    public function return(FindTripsRequest $request)
    {
        dd('return');
        $searchInputs = $this->getSearchInputs($request);

        return view('available-trips', compact('searchInputs', 'availableTrips'));
    }

    public function checkout(FindTripsRequest $request)
    {
        $searchInputs = $this->getSearchInputs($request);

        $trip = Trip::findOrFail($request->depart_trip);

        if(Auth::guest() && !session()->has('from')) {
            session()->put('from', url()->current());
        }

        return view('traveler.checkout', compact('searchInputs', 'trip'));
    }

    public function book(Request $request)
    {
        $departTripData = [
            'user_id' => Auth::user()->id,
            'trip_id' => $request->depart_trip,
            'seats' => $request->seats,
            'status' => 'Pending'
        ];

        try {
            Booking::create($departTripData);
            return redirect()->route('trips')->with('success', 'Trip has been booked successfully.');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors('Unable to book trip');
        }
    }

    protected function getSearchInputs($request)
    {
        $city_from = City::where('is_active', 1)->findOrFail($request->from);
        $city_to = City::where('is_active', 1)->findOrFail($request->to);
        $departDate =  new Carbon($request->depart);
        $returnDate = $request->return ? clone new Carbon($request->return) : '-';

        return [
            'from' => $city_from,
            'to' => $city_to,
            'depart' => $departDate,
            'return' => $returnDate,
            'seats' => $request->seats,
        ];
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

        $travelerTrips = Booking::where('user_id', Auth::user()->id)->get();

        $endOfToday = Carbon::today()->endOfDay();

        $upcomingTrips = [];
        $history = [];
        foreach ($travelerTrips as $trip) {
            if ($trip['depart'] > $endOfToday) {
                array_push($upcomingTrips, $trip);
            } else {
                array_push($history, $trip);
            }
        }

        return view('trips', compact('upcomingTrips', 'history'));
    }
}
