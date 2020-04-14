<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusRequest extends FormRequest
{
    public function rules()
    {
        $busID = $this->route('bus') ? $this->route('bus') : '';
        return [
            'bus_number' => 'max:255',
            'licence_plate' => 'required|max:255|unique:buses,licence_plate,' . $busID,
            'registration' => 'max:255',
        ];
    }
}
