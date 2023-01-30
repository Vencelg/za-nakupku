<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListingRequest extends FormRequest
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
                'category_id' => ['required', 'exists:App\Models\Category,id'],
                'name' => ['required', 'string'],
                'info' => ['required', 'string'],
                'price' => ['required', 'integer'],
                'phone_number' => ['required', 'string'],
                'location' => ['required', 'string'],
                'ending' => ['required', 'date_format:Y-m-d H:i:s'],
                'sold' => ['required', 'bool']
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'user_id' => ['exists:App\Models\User,id'],
                'category_id' => ['exists:App\Models\Category,id'],
                'name' => ['string'],
                'info' => ['string'],
                'price' => ['integer'],
                'phone_number' => ['string'],
                'location' => ['string'],
                'ending' => ['date_format:Y-m-d H:i:s'],
                'sold' => ['bool']
            ];
        }
    }
}
