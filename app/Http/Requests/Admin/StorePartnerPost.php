<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StorePartnerPost extends FormRequest
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
            'subtitle'          => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'icon_url'          => 'required|string|max:255',
            'banner_url'        => 'required|string|max:255',
            'banner_title'      => 'nullable|string|max:255',
            'banner_subtitle'   => 'nullable|string|max:255',
            'banner_button'     => 'nullable|string|max:255',
            'banner_action'     => 'nullable|string|max:255',
            'body'              => 'required|string',
            'button_text'       => 'required|string|max:255',
            'action'            => 'required|string|max:255',
            'type'              => 'required|string|in:affiliate,relocation',
            'meta_description'  => 'nullable|string|max:500',
            'meta_keyword'      => 'nullable|string|max:255',
            'order'             => 'required|integer',
            'partner_id'        => 'nullable|integer',
            'is_active'         => 'required|in:0,1',
        ];

        return $rules;
    }

}
