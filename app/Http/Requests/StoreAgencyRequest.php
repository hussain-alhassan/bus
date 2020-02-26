<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        $agencyID = auth()->user()->agencies()->first()->id;

        if(intval($this->route('agency')) === $agencyID) return true;

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'name_en' => 'required|max:50',
            'logo' => 'nullable|image|max:2048',
            'description' => 'required|string',
            'hotline' => 'max:20|nullable',
        ];
    }
}
