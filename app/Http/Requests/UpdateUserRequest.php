<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        if ($this->isMethod('PUT')) {
            return [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:254'],
                'email_verified_at' => ['required', 'nullable', 'date'],
                'is_admin' => ['required', 'boolean'],
                'phone_number' => ['nullable', 'string'],
                'location' => ['nullable', 'string'],
            ];
        }

        if ($this->isMethod('PATCH') || $this->isMethod('POST')) {
            return [
                'firstname' => ['string', 'max:255'],
                'lastname' => ['string', 'max:255'],
                'name' => ['string', 'max:255'],
                'email' => ['email', 'max:254'],
                'email_verified_at' => ['nullable', 'date'],
                'is_admin' => ['boolean'],
                'phone_number' => ['nullable', 'string'],
                'location' => ['nullable', 'string'],
            ];
        }
    }
}
