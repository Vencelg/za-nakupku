<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
                'user_id' => ['required', 'exists:App\Models\User,id'],
                'created_by_id' => ['required', 'exists:App\Models\User,id'],
                'header' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
                'rating' => ['required', 'integer', 'max:5', 'min:0'],
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'user_id' => ['exists:App\Models\User,id'],
                'created_by_id' => ['exists:App\Models\User,id'],
                'header' => ['string', 'max:255'],
                'body' => ['string'],
                'rating' => ['integer', 'max:5', 'min:0'],
            ];
        }
    }
}
