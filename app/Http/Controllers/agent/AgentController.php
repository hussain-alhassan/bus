<?php

namespace App\Http\Controllers\agent;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgencyRequest;
use App\User;
use Illuminate\Http\Request;

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
    public function update(StoreAgencyRequest $agency)
    {
        dd($agency);
//        $agency = auth()->user()->agencies()->first();



//        try {
////            $agency->update($data);
//
//        } catch(\Exception $e) {
//            return redirect()->back()->withErrors($e);
//        }

        return redirect('/admin/cities')->with('success', 'City has been updated successfully.');
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
