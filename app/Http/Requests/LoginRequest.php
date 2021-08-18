<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'min:4 ', 'max:255'],
            'password' => ['required', 'string', 'max:1'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The username field required',
            'password.required' => "The password field required.",
        ];
    }
}
