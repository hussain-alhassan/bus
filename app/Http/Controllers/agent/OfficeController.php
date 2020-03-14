<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the cities.
     */
    public function showOffices()
    {
        $agencyID = auth()->user()->agencies()->first()->id;

        $offices = Office::all()->where('agency_id', $agencyID);

        return view('agent.office-management', compact('offices'));
    }

    public function create()
    {
        return view('agent.create-office');
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest();

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $agencyID = auth()->user()->agencies()->first()->id;
        $data['agency_id'] = $agencyID;

        try {
            Office::create($data);

        } catch(\Exception $e) {

            return redirect()->back()->withErrors($e);
        }

        return redirect('/agent/offices')->with('success', 'Office has been created successfully.');
    }

    public function edit(Office $office)
    {
        return view('agent.edit-office', compact('office'));
    }

    public function update(Office $office)
    {
        $data = $this->validateRequest($office);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        try {
            $office->update($data);

        } catch(\Exception $e) {
            return redirect()->back()->withErrors($e);
        }

        return redirect('/agent/offices')->with('success', 'Office has been updated successfully.');
    }

    public function activate(Office $office)
    {
        $office->update(['is_active' => 1]);
        return redirect('/agent/offices')->with('success', 'Office has been activated successfully.');
    }

    public function disable(Office $office)
    {
        $office->update(['is_active' => 0]);
        return redirect('/agent/offices')->with('success', 'Office has been disabled successfully.');
    }

    public function setMainBranch(Request $request)
    {
        // check whether agent owns this office
        $office = Office::findOrFail($request->office_id);
        $autAgencyID = auth()->user()->agencies()->first()->id;
        if($office->agency_id !== $autAgencyID) abort(404);

        // reset 'is_main_branch' to 0 for the other offices
        Office::where('is_main_branch', 1)->where('agency_id', $autAgencyID)->update(['is_main_branch' => 0]);

        // set the new main branch
        $office->where('id', $request->office_id )->update(['is_main_branch' => 1]);

        return redirect('/agent/offices')->with('success', 'Main branch has been set up successfully.');
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

    /**
     * validate request data before create and update
     */
    public function validateRequest($office = [])
    {
        $officeID = isset($office->id) ? $office->id : '';
        return request()->validate([
            'name' => 'required|max:255|unique:offices,name,' . $officeID,
            'address' => 'required',
            'location_link' => 'required',
            'hours' => 'required',
            'phone' => 'required|max:255',
            'is_active' => 'max:2|nullable',
        ]);
    }
}
