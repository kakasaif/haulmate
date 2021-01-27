<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUserPost extends FormRequest
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
        $user_id = $this->segment(3);
        $rules = [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user_id),
            ],
            'password'          => 'required',
            'username'          => 'required',
            'phone'             => 'required',
            'photo_url'         => 'nullable',
            'gender'            => 'required',
            'birthday'          => 'required',
            'status'            => 'required',
        ];
        
        if ($this->method() == "PUT") {
            $rules['password'] = 'nullable';
        }

        return $rules;
    }
}
