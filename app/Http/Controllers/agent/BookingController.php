<?php

namespace App\Http\Controllers\agent;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $agencyId = DB::table('agency_user')->where('user_id', Auth::id())->first()->agency_id;
        $officesIds = Office::select('id')->where('agency_id', $agencyId)->get()->toArray();
        $bookings = Booking::whereIn('office_id', $officesIds)->orderBy('created_at', 'DESC')->get();

        return view('agent.booking', compact('bookings'));
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

    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'Confirmed']);
        return redirect()->route('bookings.index')->with('success', 'Booking record has been approved successfully');
    }

    public function pend(Booking $booking)
    {
        $booking->update(['status' => 'Pending']);
        return redirect()->route('bookings.index')->with('success', 'Booking record has been pended successfully');
    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'Rejected']);
        return redirect()->route('bookings.index')->with('success', 'Booking record has been rejected successfully');
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
