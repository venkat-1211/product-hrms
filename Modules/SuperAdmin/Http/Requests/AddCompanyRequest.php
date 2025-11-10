<?php

namespace Modules\SuperAdmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddCompanyRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     protected $errorBag = 'addCompany'; // Tell Laravel to store validation errors in this named bag

    public function authorize(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:companies,name',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'account_url' => 'nullable|string|unique:companies,account_url',
            'phone' => 'required|string|unique:companies,phone',
            'website' => 'nullable|string|unique:companies,website',
            'address' => 'nullable|string',
            'package_id' => 'required|exists:packages,id',
            'type' => 'required|in:Monthly,Yearly,Lifetime',
            'currency' => 'required|in:USD,EUR,INR,GBP,CAD,JPY',
            'status' => 'required|in:Active,Inactive',
        ];
    }

        /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The company name is required.',
            'name.unique' => 'The company name is already taken.',
            'email.unique' => 'The company email is already taken.',
            'email.email' => 'The company email must be a valid email address.',
            'password.required' => 'The company password is required.',
            'password.min' => 'The company password must be at least 8 characters.',
            'confirm_password.required' => 'The company confirm password is required.',
            'confirm_password.same' => 'The company confirm password does not match.',
            // 'logo.image' => 'The company logo must be an image.',
            'logo.mimes' => 'The company logo must be a file of type: jpeg, png, jpg, gif, svg.',
            'logo.max' => 'The company logo must not exceed 2048 kilobytes.',
            'account_url.unique' => 'The company account URL is already taken.',
            'phone.required' => 'The company phone number is required.',
            'phone.unique' => 'The company phone number is already taken.',
            'website.unique' => 'The company website is already taken.',
            'package_id.required' => 'The company package is required.',
            'package_id.exists' => 'The company package is invalid.',
            'type.required' => 'The company type is required.',
            'type.in' => 'The company type must be Monthly, Yearly, or Lifetime.',
            'currency.required' => 'The company currency is required.',
            'currency.in' => 'The company currency must be USD, EUR, INR, GBP, CAD, or JPY.',
            'status.required' => 'The company status is required.',
            'status.in' => 'The company status must be Active or Inactive.',
        ];
    }

    // This Codes is mily used for Once, Error Raise , Reopen modal Automatically with Add plan modal only Open
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()
                ->back()
                ->withInput()
                ->withErrors($validator, $this->errorBag) // use errorBag
        );
    }
}
