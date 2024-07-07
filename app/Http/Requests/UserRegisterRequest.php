<?php

namespace App\Http\Requests;
const MAX255 = 'max:255';

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', MAX255, 'bail'],
            'username' => ['required', 'string', MAX255, 'unique:users', 'bail'],
            'email' => ['required', 'string', 'email', MAX255, 'unique:users', 'bail'],
            'password' => ['required', 'string', 'min:12', 'confirmed', 'bail'],
            'contact_number' => ['required', 'integer', MAX255, 'unique:users', 'bail'],
            'bio' => ['nullable', 'string', 'bail'],

            'street_name' => ['required', 'string', MAX255, 'bail'],
            'city_name' => ['required', 'string', MAX255, 'bail'],
            'state_province' => ['required', 'string', MAX255, 'bail'],
            'postal_code' => ['required', 'integer', MAX255, 'bail'],
            'country_name' => ['required', 'string', MAX255, 'bail'],
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
            'name.required' => 'Please enter your name.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name cannot be longer than 255 characters.',

            'username.required' => 'Please enter your username.',
            'username.string' => 'Username must be a string.',
            'username.max' => 'Username cannot be longer than 255 characters.',
            'username.unique' => 'Username already taken.',

            'email.required' => 'Please enter your email.',
            'email.string' => 'Email must be a string.',
            'email.max' => 'Email cannot be longer than 255 characters.',
            'email.unique' => 'Email already registered.',
            'email.email' => 'Invalid email address.',

            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 12 characters.',
            'password.string' => 'Password must be a string.',
            'password.confirmed' => 'Passwords do not match.',

            'contact.required' => 'Please enter your contact information.',
            'contact.integer' => 'Invalid contact format.',
            'contact.max' => 'Contact number cannot be longer than 255 characters.',
            'contact.unique' => 'Contact number already in use.',

            'bio.string' => 'Bio must be a string.',

            'street_name.required' => 'Please enter your street name.',
            'street_name.string' => 'Street name must be a string.',
            'street_name.max' => 'Street name cannot be longer than 255 characters.',

            'city_name.required' => 'Please enter your city name.',
            'city_name.string' => 'City name must be a string.',
            'city_name.max' => 'City name cannot be longer than 255 characters.',

            'state_province.required' => 'Please enter your state province.',
            'state_province.string' => 'State province must be a string.',
            'state_province.max' => 'State province cannot be longer than 255 characters.',

            'postal_code.required' => 'Please enter your postal code.',
            'postal_code.integer' => 'Postal code format invalid.',
            'postal_code.max' => 'Postal code cannot be longer than 255 characters.',

            'country_name.required' => 'Please enter your country name.',
            'country_name.string' => 'Country name must be a string.',
            'country_name.max' => 'Country name cannot be longer than 255 characters.',
        ];
    }
}
