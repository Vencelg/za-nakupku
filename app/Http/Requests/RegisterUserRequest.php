<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'unique:App\Models\User,email', 'email', 'max:254'],
            'password' => ['required', 'confirmed', 'regex:"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"'],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'The password must be 8 characters long and contain numeric and alphabetic characters',
        ];
    }
}
