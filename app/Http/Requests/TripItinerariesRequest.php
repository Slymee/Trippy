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

    /**
    * Custom errors and messages for validation rules
    *
    * @return string[]
    */
    public function messages(): array
    {
        return [
            'trip.name.required' => 'Please enter the trip name.',
            'trip.name.string' => 'Trip name must be a string.',
            'trip.name.max' => 'Trip name cannot be longer than 255 characters.',

            'trip.description.required' => 'Please enter the trip description.',
            'trip.description.string' => 'Trip description must be a string.',

            'trip.start_date.required' => 'Please enter the trip start date.',
            'trip.start_date.date' => 'Invalid trip start date format.',
            'trip.start_date.before' => 'Trip start date must be before today.',

            'trip.registration_deadline.required' => 'Please enter the trip registration deadline.',
            'trip.registration_deadline.date' => 'Invalid trip registration deadline format.',
            'trip.registration_deadline.after' => 'Trip registration deadline must be at least 3 days before the trip start date.',

            'trip.max_individuals.required' => 'Please enter the maximum number of individuals for the trip.',
            'trip.max_individuals.integer' => 'Maximum number of individuals must be an integer.',

            'trip.destinations.required' => 'Please enter at least one destination for the trip.',
            'trip.destinations.array' => 'Destinations must be an array.',

            'trip.destinations.*.name.required' => 'Please enter the destination name.',
            'trip.destinations.*.name.string' => 'Destination name must be a string.',
            'trip.destinations.*.name.max' => 'Destination name cannot be longer than 255 characters.',

            'trip.destinations.*.longitude.required' => 'Please enter the destination longitude.',
            'trip.destinations.*.longitude.numeric' => 'Destination longitude must be a number.',
            'trip.destinations.*.longitude.decimal' => 'Destination longitude must be a decimal value with 2-10 digits.',

            'trip.destinations.*.latitude.required' => 'Please enter the destination latitude.',
            'trip.destinations.*.latitude.numeric' => 'Destination latitude must be a number.',
            'trip.destinations.*.latitude.decimal' => 'Destination latitude must be a decimal value with 2-10 digits.',

            'trip.destinations.*.itineraries.*.name.required' => 'Please enter the itinerary name.',
            'trip.destinations.*.itineraries.*.name.string' => 'Itinerary name must be a string.',
            'trip.destinations.*.itineraries.*.name.max' => 'Itinerary name cannot be longer than 255 characters.',

            'trip.destinations.*.itineraries.*.arrival_date.required' => 'Please enter the itinerary arrival date.',
            'trip.destinations.*.itineraries.*.arrival_date.date' => 'Invalid itinerary arrival date format.',
            'trip.destinations.*.itineraries.*.arrival_date.after' => 'Itinerary arrival date must be after the trip start date.',
            'trip.destinations.*.itineraries.*.arrival_date.before' => 'Itinerary arrival date must be before the trip end date.',

            'trip.destinations.*.itineraries.*.departure_date.required' => 'Please enter the itinerary departure date.',
            'trip.destinations.*.itineraries.*.departure_date.date' => 'Invalid itinerary departure date format.',
            'trip.destinations.*.itineraries.*.departure_date.after' => 'Itinerary departure date must be after the itinerary arrival date.',
            'trip.destinations.*.itineraries.*.departure_date.before' => 'Itinerary departure date must be before the trip end date.',

            'trip.destinations.*.itineraries.*.accommodations.array' => 'Accommodations must be an array.',
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_name.required_with' => 'Please enter the accommodation name.',
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_name.string' => 'Accommodation name must be a string.',
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_name.max' => 'Accommodation name cannot be longer than 255 characters.',

            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_type.required_with' => 'Please enter the accommodation type.',
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_type.string' => 'Accommodation type must be a string.',
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_type.max' => 'Accommodation type cannot be longer than 255 characters.',

            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_contact.required_with' => 'Please enter the accommodation contact.',
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_contact.string' => 'Accommodation contact must be a string.',
            'trip.destinations.*.itineraries.*.accommodations.*.accommodation_contact.max' => 'Accommodation contact cannot be longer than 255 characters.',

            'trip.destinations.*.itineraries.*.accommodations.*.price_per_room.required_with' => 'Please enter the price per room.',
            'trip.destinations.*.itineraries.*.accommodations.*.price_per_room.numeric' => 'Price per room must be a number.',
            'trip.destinations.*.itineraries.*.accommodations.*.price_per_room.decimal' => 'Price per room must be a decimal value with 2-10 digits.',

            'trip.destinations.*.itineraries.*.transportations.array' => 'Transportations must be an array.',
            'trip.destinations.*.itineraries.*.transportations.*.transportation_name.required_with' => 'Please enter the transportation name.',
            'trip.destinations.*.itineraries.*.transportations.*.transportation_name.string' => 'Transportation name must be a string.',
            'trip.destinations.*.itineraries.*.transportations.*.transportation_name.max' => 'Transportation name cannot be longer than 255 characters.',

            'trip.destinations.*.itineraries.*.transportations.*.transportation_type.required_with' => 'Please enter the transportation type.',
            'trip.destinations.*.itineraries.*.transportations.*.transportation_type.string' => 'Transportation type must be a string.',
            'trip.destinations.*.itineraries.*.transportations.*.transportation_type.max' => 'Transportation type cannot be longer than 255 characters.',

            'trip.destinations.*.itineraries.*.transportations.*.transportation_contact.required_with' => 'Please enter the transportation contact.',
            'trip.destinations.*.itineraries.*.transportations.*.transportation_contact.string' => 'Transportation contact must be a string.',
            'trip.destinations.*.itineraries.*.transportations.*.transportation_contact.max' => 'Transportation contact cannot be longer than 255 characters.',

            'trip.destinations.*.itineraries.*.transportations.*.price_per_person.required_with' => 'Please enter the price per person.',
            'trip.destinations.*.itineraries.*.transportations.*.price_per_person.numeric' => 'Price per person must be a number.',
            'trip.destinations.*.itineraries.*.transportations.*.price_per_person.decimal' => 'Price per person must be a decimal value with 2-10 digits.',
        ];
    }
}
