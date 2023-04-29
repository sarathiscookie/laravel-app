<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'contacts.*.email' => 'required|string|email|max:255|unique:hotel_contacts',
            'contacts.*.phone' => 'required|array'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'contacts.*.email.required' => 'The email field is required.',
            'contacts.*.email.string' => 'The email field must be a string.',
            'contacts.*.email.email' => 'The email field must be a valid email address.',
            'contacts.*.email.max' => 'The email field must not be greater than 255 characters.',
            'contacts.*.phone.required' => 'The phone field is required.',
            'contacts.*.phone.array' => 'The phone field must be an array.',
        ];
    }
}
