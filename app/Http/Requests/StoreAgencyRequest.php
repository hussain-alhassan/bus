<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAgencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->role === 's') return true;

        $agencyID = Auth::user()->agencies()->first()->id;

        return intval($this->route('agency')) === $agencyID;
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
            'logo' => 'bail|image|nullable|max:2048',
            'description' => 'required|string',
            'hotline' => 'max:20|nullable',
        ];
    }
}
