<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TripItenerariesRequest extends FormRequest
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
            'trip.name' => ['required', 'string', 'max:255', 'bail'],
            'trip.description' => ['required', 'string'],
            'trip.start_date' => ['required', 'date', 'before:today'], // YYYY-MM-DD format
            'trip.registration_deadline' => [
                'required',
                'date',
                'after:' . Carbon::parse(request('trip.start_date'))->subDays(3)->format('Y-m-d'),
            ],
            'trip.max_individuals' => ['required', 'integer'],

            'trip.destinations' => ['required', 'array'],
            'trip.destinations.*.name' => ['required', 'string', 'max:255'],
            'trip.destinations.*.longitude' => ['required', 'numeric', 'digits_between:2,10'],
            'trip.destinations.*.latitude' => ['required', 'numeric', 'digits_between:2,10'],

            'trip.destinations.*.iteneraries.*.name' => ['required', 'string', 'max:255'],
            'trip.destinations.*.iteneraries.*.arrival_date' =>[
                'required', 'date',
                'after:trip.start_date',
                'before:trip.end_date',
            ],
            'trip.destinations.*.iteneraries.*.departure_date' => [
                'required', 'date',
                'after:trip.destinations.*.iteneraries.*.arrival_date',
                'before:trip.end_date',
            ],

            'trip.destinations.*.iteneraries.*.accomodations.*.accomodation_name' => ['required', 'string', 'max:255']
        ];
    }
}
