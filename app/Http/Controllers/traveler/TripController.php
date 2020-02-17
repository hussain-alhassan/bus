<?php

namespace App\Http\Controllers\traveler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TripController extends Controller
{
    //
    /**
     * Search for available trips
     * @return mixed
     * @throws \Exception
     */
    public function search(Request $request)
    {
        // will improve the validation later
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'depart' => 'required|date_format:Y-m-d',
            'return' => 'nullable|date_format:Y-m-d',
            'seats' => 'required|min:1|max:2',
        ]);


        $departDate = clone new Carbon($request->query('depart'));

        // need to work on the return trip more
        $return = null;
        if(!empty($request->query('return'))) $return = clone new Carbon($request->query('return'));

        $searchInputs = [
            'from' => Str::ucfirst($request->query('from')),
            'to' => Str::ucfirst($request->query('to')),
            'depart' => $departDate,
            'return' => $return,
            'seats' => $request->query('seats'),
        ];

        /* "First" available trip calculation (later will come from the model) */
        // assuming first trip depart at 9:30pm (travel agency will enter departure time)
        $departureHour1 = '21'; // 9pm
        $departureMinute1 = '30'; // because 9:30pm

        // initially comes from agency control panel, but later should be from multiple trips average calculation
        $tripDuration1 = '10';

        // total hours from beginning of the day because Datepicker starts at 00:00 time
        $totalHours1 = intval($departureHour1) + intval($tripDuration1);
        $arrivalDateTime1 = $departDate->copy()->addHours($totalHours1)->addMinutes($departureMinute1);

        /* "Second" available trip calculation (later will come from the model) */
        $departureHour2 = '20'; // 8pm
        $departureMinute2 = '0'; // because 8:00pm
        $tripDuration2 = '11';

        $totalHours2 = intval($departureHour2) + intval($tripDuration2);
        $arrivalDateTime2 = $departDate->copy()->addHours($totalHours2)->addMinutes($departureMinute2);

        // Mock returned available trips from DB
        $availableTrips = [
            [
                'agency' => 'Al salem',
                'depart' => $departDate,
                'depart_time' => '9:30pm',
                'arrival_day' => $arrivalDateTime1->format('l'),
                'arrival_time' => $arrivalDateTime1->format('h:ia')
            ],
            [
                'agency' => 'Gulf Bus',
                'depart' => $searchInputs['depart'],
                'depart_time' => '8:00pm',
                'arrival_day' => $arrivalDateTime2->format('l'),
                'arrival_time' => $arrivalDateTime2->format('h:ia')
            ]
        ];

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
