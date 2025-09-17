<?php

namespace Modules\Auth\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class ProfileUpdateRequest extends BaseFormRequest
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
            // Profile Image
            'profile_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Basic Info
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone_number'     => 'required|string|max:20',

            // Address Fields
            'address'          => 'required|string|max:500',
            'country'          => 'required|string|max:100',
            'state'            => 'required|string|max:100',
            'city'             => 'nullable|integer',
            'postal_code'      => 'required|string|max:20',

            // Password Update
            'current_password' => 'nullable|string|min:8',
            'password'     => 'nullable|required_with:current_password|string|min:8',
            'confirm_password' => 'nullable|required_with:current_password|string|same:password',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            // If current_password is filled, check it against the actual user password
            if ($this->filled('current_password')) {
                if (! Hash::check($this->input('current_password'), $this->user()->password)) {
                    $validator->errors()->add('current_password', 'The current password is incorrect.');
                }
            }
        });
    }

    /**
     * Custom messages for validation errors
     */
    public function messages(): array
    {
        return [
            // Profile image
            'profile_image.image'  => 'The profile image must be a valid image file.',
            'profile_image.mimes'  => 'The profile image must be a jpeg, png, jpg, or gif.',
            'profile_image.max'    => 'The profile image size must not exceed 2MB.',

            // Basic Info
            'first_name.required'  => 'First name is required.',
            'last_name.required'   => 'Last name is required.',
            'email.required'       => 'Email address is required.',
            'email.email'          => 'Please provide a valid email address.',
            'phone_number.required'=> 'Phone number is required.',

            // Address Fields
            'address.required'     => 'Address is required.',
            'country.required'     => 'Country is required.',
            'state.required'       => 'State is required.',
            'city.required'        => 'City is required.',
            'city.integer'         => 'City must be a valid ID.',
            'postal_code.required' => 'Postal code is required.',

            // Password Fields
            'current_password.min'       => 'Current password must be at least 8 characters.',
            'password.required_with' => 'New password is required when changing your password.',
            'password.min'           => 'New password must be at least 8 characters.',
            'confirm_password.required_with' => 'Confirm password is required when changing your password.',
            'confirm_password.same'      => 'Confirm password must match the new password.',
        ];
    }
}
