<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'trip_name' => ['required', 'string', 'max:255'],
            'trip_description' => ['required', 'string', 'max:255'],
            'trip_type' => ['required', 'string', 'max:255'],
            'trip_price' => ['required', 'numeric'],
            'start_date' => ['required', 'date_format:Y-m-d'],
            'end_date' => ['required', 'date_format:Y-m-d'],
            'arrival_time' => ['required', 'string', 'max:255'],
            'total_people' => ['required', 'string'],
            'means_of_transport' => ['required', 'string', 'max:255'],
            'is_private' => ['sometimes', 'boolean'],

            'start_loc' => ['required', 'string', 'max:255'],
            'start_loc_name' => ['required', 'string', 'max:255'],
            'end_loc' => ['required', 'string', 'max:255'],
            'end_loc_name' => ['required', 'string', 'max:255'],

            'location' => ['sometimes', 'array'],
            'location.*' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
