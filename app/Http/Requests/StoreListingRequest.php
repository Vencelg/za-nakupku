<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'category_id' => ['required', 'exists:App\Models\Category,id'],
            'name' => ['required', 'string'],
            'info' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'phone_number' => ['required', 'string'],
            'location' => ['required', 'string'],
            'ending' => ['required', 'date_format:Y-m-d H:i:s', 'after:tomorrow']
        ];
    }

    public function messages()
    {
        return [
            'ending.after' => 'Auction can\'t end on today\'s date'
        ];
    }
}
