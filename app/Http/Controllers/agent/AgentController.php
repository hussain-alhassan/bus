<?php

namespace App\Http\Controllers\agent;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AgentController extends Controller
{
    public function index()
    {
        return view('agent.dashboard');
    }

    /**
     * Display the agent profile to edit it
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $agency = auth()->user()->agencies()->first();

        return view('agent.profile', compact('agency'));
    }

    /**
     * Update the agent profile data
     * @param StoreAgencyRequest $agency
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreAgencyRequest $agency, $id)
    {
        $agencyModel = Agency::findOrFail($id);

        try {
            if($agency->hasFile('logo')) {
                $extension = $agency->file('logo')->getClientOriginalExtension();
                $agencyID = auth()->user()->agencies()->first()->id;
                $fileName = sprintf('agency_%s_%s.%s', $agencyID, now()->timestamp, $extension);

                // store new logo
                $agency->file('logo')->storeAs('public/images/logos', $fileName);

                // delete previous logo from storage
                $previousLogo = $agencyModel->logo;
                @unlink(storage_path() . "/app/public/images/logos/$previousLogo");
            }

            $data = collect($agency->request)->only(['name', 'name_en', 'description', 'hotline'])->toArray();
            if(!empty($fileName)) $data = Arr::add($data, 'logo', $fileName); // add logo 'name' to the DB

            $agencyModel->update($data);
        } catch(\Exception $e) {
            return redirect()->back()->withErrors($e);
        }

        return redirect('/agent/profile')->with('success', 'Profile has been updated successfully.');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
