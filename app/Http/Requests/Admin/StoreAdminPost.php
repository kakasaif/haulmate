<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreAdminPost extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role === 'Super';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_id = $this->segment(3);
        $rules = [
            'name'      => 'required',
            'email'     => [
                'required',
                Rule::unique('administrator')->ignore($user_id),
            ],
            'password'  => 'required',
            'role'      => 'required|in:Super,Admin,Housing,Partner,Both',
        ];

        if ($this->method() == "PUT") {
            $rules['password'] = 'nullable';
        }

        return $rules;
    }

}
