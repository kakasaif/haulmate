<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreProductCategoryPost extends FormRequest
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
            'type_id'           => 'required|integer',
            'name'              => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'subtitle'          => 'required|string|max:255',
            'image'             => 'nullable|string|max:255',
            'selected_image'    => 'nullable|string|max:255',
            'order'             => 'nullable|integer',
            'is_active'         => 'required|in:0,1',
        ];

        return $rules;
    }

}
