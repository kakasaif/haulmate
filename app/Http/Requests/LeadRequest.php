<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'user_id'       => 'required|integer',
            'partner_id'    => 'nullable|integer',
            'property_id'   => 'nullable|integer',
            'street'        => 'nullable|string|max:255',
            'postal_code'   => 'nullable|string|max:10',
            'move_size'     => 'nullable|integer',
            'items'         => 'nullable|string|in:full,furniture,box',
            'mobile_phone'  => 'nullable|string|max:20',
            'moving_on'     => 'nullable|string|date_format:Y-m-d',
        ];
        return $rules;
    }

}
