<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
{
    public function rules()
    {
        $tripID = $this->route('trip') ?? '';
        return [
            'trip_number' => 'required|max:255|unique:trips,trip_number,' . $tripID,
            'from' => 'required:numeric',
            'to' => 'required|numeric|different:from',
            'depart' => 'required|date',
            'duration' => 'required|numeric|min:1|max:30',
            'available_seats' => 'required|numeric|min:1|max:200',
            'is_bathroom' => 'required|max:1',
            'is_wifi' => 'required|max:1',
            'is_meal' => 'required|max:1',
            'is_refreshment' => 'required|max:1',
        ];
    }
}
