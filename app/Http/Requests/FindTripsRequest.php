<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindTripsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'from' => 'required:numeric',
            'to' => 'required|numeric|different:from',
            'depart' => 'required|date_format:Y-m-d',
            'return' => 'nullable|date_format:Y-m-d',
            'seats' => 'required|min:1|max:2',
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
