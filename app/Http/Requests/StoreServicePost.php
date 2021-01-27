<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreServicePost extends FormRequest
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
            'name'             => 'required|string|max:255',
            'description'      => 'required',
            'default_icon_url' => 'nullable',
            'active_icon_url'  => 'nullable',
            'order'            => 'integer',
            'is_active'        => 'required|in:0,1',
        ];

        return $rules;
    }
}
