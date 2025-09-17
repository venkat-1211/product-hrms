<?php

namespace Modules\Hrm\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Carbon\Carbon;

class AddEmployeeRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected $errorBag = 'addEmployee';

    public function authorize(): bool
    {
        return true;
    }

    
    protected function prepareForValidation(): void
    {
        if ($this->filled('joining_date')) {
            try {
                $this->merge([
                    'joining_date' => Carbon::createFromFormat('d-m-Y', $this->joining_date)
                                            ->format('Y-m-d'),
                ]);
            } catch (\Exception $e) {
                // Invalid date format - keep original so validation can catch it
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            // profile table
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'employee_id' => 'required|string|unique:profiles,employee_id',
            'joining_date' => 'required|date',
            'phone_number' => 'required|string|unique:profiles,phone_number',
            'address' => 'required|string',
            'about' => 'nullable|string',

            // users table
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',

            // Other Tables
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',

            // Permissions
            'permissions' => 'nullable|array',

        ];
    }

    public function messages(): array
    {
        return [
            'profile_image.image' => 'The profile image must be an image.',
            'profile_image.mimes' => 'The profile image must be a file of type: jpeg, png, jpg, gif, svg.',
            'profile_image.max' => 'The profile image must not exceed 2048 kilobytes.',
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name is only allow characters.',
            'last_name.required' => 'The last name is required.',
            'last_name.string' => 'The last name is only allow characters.',
            'employee_id.required' => 'The employee id is required.',
            'employee_id.string' => 'The employee id is only allow characters.',
            'joining_date.required' => 'The joining date is required.',
            'joining_date.date' => 'The joining date is not a valid date.',
            'phone_number.required' => 'The phone number is required.',
            'phone_number.string' => 'The phone number is only allow characters.',
            'address.required' => 'The address is required.',
            'address.string' => 'The address is only allow characters.',
            'about.string' => 'The about is only allow characters.',
            'username.required' => 'The username is required.',
            'username.unique' => 'The username is already taken.',
            'email.required' => 'The email is required.',
            'email.unique' => 'The email is already taken.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'confirm_password.required' => 'The confirm password is required.',
            'confirm_password.same' => 'The confirm password does not match.',
            'department_id.required' => 'The department is required.',
            'designation_id.required' => 'The designation is required.',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()
                ->back()
                ->withInput()
                ->withErrors($validator, $this->errorBag) // ✅ use errorBag
        );
    }
}
