<?php

namespace App\Http\Requests;
const MAX255 = 'max:255';
const DEC2TO10 = 'digits_between:2,10';

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TripItinerariesRequest extends FormRequest
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
            'trip.name' => ['required', 'string', MAX255, 'bail'],
            'trip.description' => ['required', 'string'],
            'trip.start_date' => ['required', 'date', 'before:today'], // YYYY-MM-DD format
            'trip.registration_deadline' => [
                'required',
                'date',
                'after:' . Carbon::parse(request('trip.start_date'))->subDays(3)->format('Y-m-d'),
            ],
            'trip.max_individuals' => ['required', 'integer'],

            'trip.destinations' => ['required', 'array'],
            'trip.destinations.*.name' => ['required', 'string', MAX255],
            'trip.destinations.*.longitude' => ['required', 'numeric', DEC2TO10],
            'trip.destinations.*.latitude' => ['required', 'numeric', DEC2TO10],

            'trip.destinations.*.itineraries.*.name' => ['required', 'string', MAX255],
            'trip.destinations.*.itineraries.*.arrival_date' =>[
                'required', 'date',
                'after:trip.start_date',
                'before:trip.end_date',
            ],
            'trip.destinations.*.itineraries.*.departure_date' => [
                'required', 'date',
                'after:trip.destinations.*.itineraries.*.arrival_date',
                'before:trip.end_date',
            ],

            'trip.destinations.*.itineraries.*.accommodations' => ['sometimes','array'],
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_name' => ['required_with:trip.destinations.*.itineraries.*.accommodations', 'string', MAX255],
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_type' => ['required_with:trip.destinations.*.itineraries.*.accommodations', 'string', MAX255],
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_contact' => ['required_with:trip.destinations.*.itineraries.*.accommodations', 'string', MAX255],
            'trip.destinations.*.itineraries.*.accommodations.*.price_per_room' => ['required_with:trip.destinations.*.itineraries.*.accommodations', 'numeric', DEC2TO10],

            'trip.destinations.*.itineraries.*.transportations' => ['sometimes','array'],
            'trip.destinations.*.itineraries.*.transportations.*.transportation_name' => ['required_with:trip.destinations.*.itineraries.*.transportations', 'string', MAX255],
            'trip.destinations.*.itineraries.*.transportations.*.transportation_type' => ['required_with:trip.destinations.*.itineraries.*.transportations', 'string', MAX255],
            'trip.destinations.*.itineraries.*.transportations.*.transportation_contact' => ['required_with:trip.destinations.*.itineraries.*.transportations', 'string', MAX255],
            'trip.destinations.*.itineraries.*.transportations.*.price_per_person' => ['required_with:trip.destinations.*.itineraries.*.transportations', 'numeric', DEC2TO10],
        ];
    }
}
