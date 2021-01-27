<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreLocationPost extends FormRequest
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
            'location'              => 'required|string|max:255',
//            'seo_name'            => 'required|string|max:50',
            'title'                 => 'required|string|max:255',
            'short_description'     => 'string',
            'description'           => 'required',
            'meta_title'            => 'nullable|string|max:255',
            'meta_description'      => 'nullable|string|max:500',
            'meta_keyword'          => 'nullable|string|max:255',
            'latitude'              => 'required|numeric|between:-90,90',
            'longitude'             => 'required|numeric|between:-180,180',
            'schools'               => 'integer',
            'supermarkets'          => 'integer',
            'restaurants'           => 'integer',
            'parks'                 => 'integer',
            'distance_from_center'  => 'integer',
            'source_url'            => 'nullable|string|max:255',
            'is_active'             => 'required|in:0,1',
            'remove_image_ids'      => 'nullable|string',
        ];

        return $rules;
    }

}
