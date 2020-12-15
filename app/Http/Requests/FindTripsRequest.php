<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FindTripsRequest extends FormRequest
{
    public function rules(Request $request)
    {
        return [
            'from' => 'required:numeric',
            'to' => 'required|numeric|different:from',
            'depart' => [
                'required',
                'date_format:Y-m-d',
                function ($attribute, $value, $fail) use ($request) {
                    $departDate = new Carbon($value);
                    if ($departDate->lessThan(Carbon::now()->setTime('00', '00'))) {
                        $fail("The Depart date should not be in the past.");
                    }
                }
            ],
            'return' => [
                'nullable',
                'date_format:Y-m-d',
                function ($attribute, $value, $fail) use ($request) {
                    $departDate =  new Carbon($request->depart);
                    $returnDate =  new Carbon($value);
                    if ($returnDate->lessThan($departDate)) {
                        $fail("The Return date has to be after Depart date.");
                    }
                }
            ],
            'seats' => 'required|min:1|max:2',
            'depart-trip' => 'nullable|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return array
     */
    public function messages()
    {
        return [
            'depart.required' => 'The Depart field is required',
        ];
    }
}
