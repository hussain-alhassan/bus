<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    /**
     * Display a listing of the cities.
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

        return redirect('/admin/cities')->with('status', 'City has been created successfully.');
    }

    public function edit(City $city)
    {
        return view('admin.edit-city', compact('city'));
    }

    public function update(City $city)
    {
        $data = $this->validateRequest();
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        try {
            $city->update($data);

        } catch(\Exception $e) {
            return redirect()->back()->withErrors($e);
        }

        return redirect('/admin/cities')->with('status', 'City has been updated successfully.');
    }

    public function activate(City $city)
    {
        $city->update(['is_active' => 1]);
        return redirect('/admin/cities')->with('status', 'City has been activated successfully.');

    }

    public function disable(City $city)
    {
        $city->update(['is_active' => 0]);
        return redirect('/admin/cities')->with('status', 'City has been disabled successfully.');

    }

    /**
     * validate request data before create and update
     */
    public function validateRequest( )
    {
        return request()->validate([
            'name' => 'required|max:25',
            'name_en' => 'required|max:25',
            'is_active' => 'max:2|nullable',
        ]);
    }
}
