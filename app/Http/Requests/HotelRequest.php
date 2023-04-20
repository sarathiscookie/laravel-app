<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|max:150',
                    'total_rooms' => 'numeric',
                    'available_rooms' => 'numeric',
                    'country_id' => 'numeric',
                    'state_id' => 'numeric',
                    'city_id' => 'numeric',
                    'location' => 'required|string|max:255',
                    'postcode' => 'required|string|max:15'
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|string|max:150',
                    'total_rooms' => 'numeric',
                    'available_rooms' => 'numeric',
                    'location' => 'required|string|max:255',
                    'postcode' => 'required|string|max:15'
                ];
            default:break;
        }
    }
}
