<?php

namespace App\Http\Controllers\agent;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripRequest;
use App\Trip;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function index()
    {
        $agencyID = Auth::user()->agencies()->first()->id;

        $trips = Trip::all()->where('agency_id', $agencyID);

        return view('agent.trips.trips-management', compact('trips'));
    }

    public function create()
    {
        $cities = (new City())->getCities();

        return view('agent.trips.create', compact('cities'));
    }

    public function store(StoreTripRequest $request)
    {
        $agencyID = Auth::user()->agencies()->first()->id;

        $data = $this->getFields($request, $agencyID);
        Trip::create($data);

        return redirect(route('trips.index'))->with('success', 'Trip has been created successfully.');
    }

    public function edit(Trip $trip)
    {
        $cities = (new City())->getCities();

        return view('agent.trips.edit', compact('trip', 'cities'));
    }

    public function update(StoreTripRequest $request, $tripID)
    {
        try {
            $agencyID = Auth::user()->agencies()->first()->id;
            $data = $this->getFields($request, $agencyID);
            Trip::where('id', $tripID)
                ->update($data);
        } catch(\Exception $e) {
            return redirect()->back()->withErrors('Unable to update Trip');
        }

        return redirect(route('trips.index'))->with('success', 'Trip has been updated successfully.');
    }

    public function destroy(Trip $trip)
    {
        try {
            $trip->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e);
        }

        return redirect(route('trips.index'))->with('success', 'Trip has been deleted successfully.');
    }

    public function getFields($request, $agencyID)
    {
        return [
            'trip_number' => $request->trip_number,
            'agency_id' => $agencyID,
            'from_city_id' => $request->from,
            'to_city_id' => $request->to,
            'depart' => $request->depart,
            'duration' => $request->duration,
            'available_seats' => $request->available_seats,
            'is_bathroom' => $request->is_bathroom,
            'is_wifi' => $request->is_wifi,
            'is_meal' => $request->is_meal,
            'is_refreshment' => $request->is_refreshment,
        ];
    }
}
