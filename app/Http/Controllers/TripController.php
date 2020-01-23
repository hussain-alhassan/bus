<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TripController extends Controller
{
    public function __construct()
    {
        $lang = session('lang', 'en');
        App::setlocale($lang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // What if traveler books round trip (Multi-city)?
        // From Alahsa -> Dubai
        // Return from Dunai -> Dammam
    }

    /**
     * Display the specified resource.
     *
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
                'depart' => 12, // will change it later
                'return' => 'some return date',
                'company_id' => 5,
                'seats' => 3,
            ],
            [
                'id' => 2,
                'from' => 'Dammam',
                'to' => 'Dubai',
                'depart' => 4,
                'return' => null,
                'company_id' => 2,
                'seats' => 2,
            ],
            [
                'id' => 2,
                'from' => 'Dubai',
                'to' => 'Dammam',
                'depart' => 1,
                'return' => null,
                'company_id' => 2,
                'seats' => 1,
            ]
        ];

        $upcomingTrips = [];
        $history = [];
        foreach ($trips as $trip) {
            if ($trip['depart'] < 5) {
                array_push($upcomingTrips, $trip);
            } else {
                array_push($history, $trip);
            }
        }

        return view('trips', compact('upcomingTrips', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
