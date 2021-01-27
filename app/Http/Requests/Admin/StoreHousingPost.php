<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreHousingPost extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title'             => 'required|string|max:255',
            'type_id'           => 'required|integer|gt:0',
            'rate'              => 'required|numeric',
            'description'       => 'required',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:500',
            'meta_keyword'      => 'nullable|string|max:255',
            'location_id'       => 'required|integer|gt:0',
            'bedrooms'          => 'required|integer',
            'persons'           => 'required|integer',
            'showers'           => 'required|string|max:10',
            'area'              => 'required|string|max:20',
            'postal_code'       => 'nullable|string|max:10',
            'latitude'          => 'nullable|numeric|between:-90,90',
            'longitude'         => 'nullable|numeric|between:-180,180',
            'listed_date'       => 'required|date_format:Y-m-d',
            'source_url'        => 'required|string|max:255',
            'partner_id'        => 'nullable|integer',
            'is_active'         => 'required|in:0,1',
        ];

        return $rules;
    }

}
