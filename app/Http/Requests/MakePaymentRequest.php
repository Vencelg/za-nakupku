<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MakePaymentRequest extends FormRequest
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
            'listing_id' => ['required', 'exists:App\Models\Listing,id'],
            'card_number' => [
                'required',
                'numeric',
                'digits:16',
                'luhn'
            ],
            'exp_month' => [
                'required',
                'numeric',
                'digits:2',
                Rule::in(range(1, 12))
            ],
            'exp_year' => [
                'required',
                'numeric',
                'digits:2',
                'min:' . date('y')
            ],
            'cvc' => [
                'required',
                'numeric',
                'digits:3'
            ]
        ];
    }

    public function messages()
    {
        return [
            'card_number.required' => 'A card number is required.',
            'card_number.numeric' => 'The card number must be a number.',
            'card_number.digits' => 'The card number must be 16 digits.',
            'card_number.luhn' => 'The card number is not valid.',
            'exp_month.required' => 'The expiration month is required.',
            'exp_month.numeric' => 'The expiration month must be a number.',
            'exp_month.digits' => 'The expiration month must be 2 digits.',
            'exp_month.in' => 'The expiration month is not valid.',
            'exp_year.required' => 'The expiration year is required.',
            'exp_year.numeric' => 'The expiration year must be a number.',
            'exp_year.digits' => 'The expiration year must be 4 digits.',
            'exp_year.min' => 'The expiration year must be greater than or equal to current year.',
            'cvc.required' => 'The CVC is required.',
            'cvc.numeric' => 'The CVC must be a number.',
            'cvc.digits' => 'The CVC must be 3 digits.',
        ];
    }
}
