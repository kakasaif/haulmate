<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreTestimonialsPost extends FormRequest
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
            'name'         => 'required|string|max:255',
            'country_id'   => 'required|string|max:255',
            'testimonial'  => 'required|string|max:255',
            'image_url'    => 'string|max:255',
            'order'        => 'string|max:255',
            'is_active'    => 'required|in:0,1',
        ];

        return $rules;
    }

}
