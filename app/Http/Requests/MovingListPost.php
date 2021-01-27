<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovingListPost extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'moving_from'   => 'required|integer',
            'moving_to'     => 'required|integer',
        ];

        return $rules;
    }
}
