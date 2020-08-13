<?php

namespace App\Http\Controllers\admin;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgencyRequest;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();

        return view('admin.agencies.agencies-management', compact('agencies'));
    }

    public function create()
    {
        return view('admin.agencies.create-agency');
    }

    public function store(StoreAgencyRequest $agency)
    {
        $isStored = DB::transaction(function () use ($agency) {
            try {
                $data = new Agency;
                $data->name = $agency->name;
                $data->name_en = $agency->name_en;
                $data->description = $agency->description;
                $data->hotline = $agency->hotline;
                $data->logo = 'temp';

                $data->save();

                if(empty($agency->file('logo'))) return false;

                $logo = $agency->file('logo');

                $fileName = 'agency';
                // image id
                $fileName .= '_' . $data->id;
                // extension
                $fileName .= '.' . $logo->getClientOriginalExtension();

                $logo->storeAs('agencies', $fileName, config('app.storage_disk'));
                $data->update(['logo' => $fileName]);
                return true;
            } catch(\Exception $e) {
                DB::rollBack();
                return false;
            }
        });

        if ($isStored) {
            return redirect(route('agencies.index'))->with('success', 'Agency has been added successfully.');
        }

        return redirect()->back()->withErrors('Unable to add Agency');
    }

    public function edit(Agency $agency)
    {
        return view('admin.agencies.edit-agency', compact('agency'));
    }

    public function update(City $city)
    {
        $data = $this->validateRequest($city);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        try {
            $city->update($data);

        } catch(\Exception $e) {
            return redirect()->back()->withErrors($e);
        }

        return redirect('/admin/cities')->with('success', 'City has been updated successfully.');
    }

    /**
     * validate request data before create and update
     */
    public function validateRequest($city = [])
    {
        $cityID = isset($city->id) ? $city->id : '';
        return request()->validate([
            'name' => 'required|max:25|unique:cities,name,' . $cityID,
            'name_en' => 'required|max:25|unique:cities,name_en,' . $cityID,
            'is_active' => 'max:2|nullable',
        ]);
    }
}
