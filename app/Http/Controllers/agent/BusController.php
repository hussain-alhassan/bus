<?php

namespace App\Http\Controllers\agent;

use App\Bus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusRequest;

class BusController extends Controller
{
    public function index()
    {
        $agencyID = auth()->user()->agencies()->first()->id;

        $buses = Bus::all()->where('agency_id', $agencyID);

        return view('agent.buses.buses-management', compact('buses'));
    }

    public function create()
    {
        return view('agent.buses.create');
    }

    public function store(StoreBusRequest $request)
    {
        $agencyID = auth()->user()->agencies()->first()->id;
        Bus::create([
            'agency_id' => $agencyID,
            'licence_plate' => $request->licence_plate,
            'bus_number' => $request->bus_number,
            'registration' => $request->registration,
        ]);

        return redirect('/agent/buses')->with('success', 'Bus has been created successfully.');
    }

    public function edit(Bus $bus)
    {
        return view('agent.buses.edit', compact('bus'));
    }

    public function update(StoreBusRequest $request)
    {
        try {
            Bus::where('id', $request->route('bus'))
                ->update([
                    'bus_number' => $request->bus_number,
                    'licence_plate' => $request->licence_plate,
                    'registration' => $request->registration
                ]);
        } catch(\Exception $e) {
            return redirect()->back()->withErrors($e);
        }

        return redirect('/agent/buses')->with('success', 'Bus has been updated successfully.');    }

    public function destroy(Bus $bus)
    {
        try {
            $bus->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e);
        }

        return redirect('/agent/buses')->with('success', 'Bus has been delete successfully.');
    }
}
