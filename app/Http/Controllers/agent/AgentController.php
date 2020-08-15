<?php

namespace App\Http\Controllers\agent;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgencyRequest;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function index()
    {
        return view('agent.dashboard');
    }

    public function profile()
    {
        $agency = auth()->user()->agencies()->first();

        return view('agent.profile', compact('agency'));
    }

    public function update(StoreAgencyRequest $request, $agencyID)
    {
        $agencyModel = Agency::findOrFail($agencyID);

        $isStored = $this->setProfile($request, $agencyModel);

        if ($isStored) {
            return redirect(route('agency.profile'))->with('success', 'Profile has been updated successfully.');
        }

        return redirect()->back()->withErrors('Unable to update Agency');
    }

    public function setProfile($request, $agencyModel)
    {
        return DB::transaction(function () use ($request, $agencyModel) {
            try {
                if($request->hasFile('logo')) {
                    $agencyModel = $this->setLogo($request, $agencyModel);
                }

                $agencyModel->update($request->except('logo'));
                return true;
            } catch(\Exception $e) {
                DB::rollBack();
                return false;
            }
        });
    }

    public function setLogo($request, $agencyModel)
    {
        $agencyModel->deletePreviousLogo();

        $logo = $request->file('logo');
        $fileName = 'agency';
        // image id
        $fileName .= '_' . $agencyModel->id;
        // extension
        $fileName .= '.' . $logo->getClientOriginalExtension();
        $logo->storeAs('agencies', $fileName, config('app.storage_disk'));
        $agencyModel->logo = $fileName;

        return $agencyModel;
    }
}
