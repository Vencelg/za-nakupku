<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
                'name' => ['required', 'string', 'max:255'],
                'code' => ['required', 'string', 'max:20', 'unique:categories'],
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'name' => ['string', 'max:255'],
                'code' => ['string', 'max:20', 'unique:categories'],
            ];
        }
    }

    public function messages()
    {
        return [
            'code.unique' => 'The code must be unique',
        ];
    }
}
