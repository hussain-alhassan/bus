<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a list of the cities.
     */
    public function showCities()
    {
        $cities = City::all();

        return view('admin.city-management', compact('cities'));
    }

    public function create()
    {
        return view('admin.create-city');
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest();
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        try {
            City::create($data);

        } catch(\Exception $e) {

            return redirect()->back()->withErrors($e);
        }

        return redirect('/admin/cities')->with('success', 'City has been created successfully.');
    }

    public function edit(City $city)
    {
        return view('admin.edit-city', compact('city'));
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

    public function activate(City $city)
    {
        $city->update(['is_active' => 1]);
        return redirect('/admin/cities')->with('success', 'City has been activated successfully.');
    }

    public function disable(City $city)
    {
        $city->update(['is_active' => 0]);
        return redirect('/admin/cities')->with('success', 'City has been disabled successfully.');
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
