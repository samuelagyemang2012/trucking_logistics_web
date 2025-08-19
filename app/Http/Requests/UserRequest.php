<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|numeric|unique:users',
            // 'profile_picture' => 'image|mimes:jpeg,png,jpg|nullable', // image size in mb and H,W
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'national_id' => ['required', Rule::in(['passport', 'ghana_card'])],
            'id_number' => 'required|unique:users',
            'address' => 'required|string|max:300',
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be string.',

            'email.required' => 'The email field is required.',
            'email.email' => 'Provide a valid email address.',
            'email.unique' => 'This email is already exists.',

            'telephone.required' => 'The telephone field is required.',
            'telephone.numeric' => 'The telephone field must be a numeric.',
            'telephone.numeric' => 'This telephone number already exists.',

            'gender.in' => 'The gender must be either "male" or "female".',

            'national_id.required' => 'The national_id field is required.',
            'national_id.in' => 'The gender must be either "passport" or "ghana_card".',

            'id_number.required' => 'The id_number field is required.',
            'id_number.unique' => 'The id_number field is required.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address field must be a string.',
            'address.max' => 'The address field has maximum character limit of 300.',

            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ];
    }
}
