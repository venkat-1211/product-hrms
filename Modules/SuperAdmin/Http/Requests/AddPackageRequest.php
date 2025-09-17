<?php

namespace Modules\SuperAdmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Common\Http\Requests\BaseFormRequest;
use Modules\SuperAdmin\Http\Rules\PercentageValidation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddPackageRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $errorBag = 'addPlan'; // ✅ Tell Laravel to store validation errors in this named bag

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
            'name' => 'required|string|max:50',
            'type' => 'required|in:Monthly,Yearly,Lifetime',
            'position' => 'required|numeric|unique:packages,position',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|in:USD,EUR,INR,GBP,CAD,JPY',
            'discount_type' => 'required|in:Fixed,Percentage',
            'discount' => ['required', 'numeric', 'min:0', new PercentageValidation],
            'description' => 'nullable|string',
            'limitation_invoices' => 'nullable|numeric|min:0',
            'max_users' => 'nullable|numeric|min:0',
            'product' => 'nullable|string|max:50',
            'supplier' => 'nullable|string|max:50',
            'access_trial' => 'nullable|boolean',
            'trial_days' => 'nullable|numeric|min:0',
            'is_recommended' => 'nullable|boolean',
            'ui_customize' => 'nullable|boolean',
            'status' => 'required|in:Active,Inactive',
            'modules' => 'required|array',
            'modules.*' => 'exists:modules,id',
            'departments' => 'required|array',
            'departments.*' => 'exists:departments,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
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
            'name.required' => 'The plan name is required.',
            'name.max' => 'The plan name must not exceed 50 characters.',
            'type.required' => 'The plan type is required.',
            'type.in' => 'The plan type must be Monthly, Yearly, or Lifetime.',
            'position.required' => 'The plan position is required.',
            'position.unique' => 'The plan position is already taken.',
            'price.required' => 'The plan price is required.',
            'price.numeric' => 'The plan price must be a number.',
            'price.min' => 'The plan price cannot be negative.',
            'currency.required' => 'The plan currency is required.',
            'currency.in' => 'The plan currency must be USD, EUR, or INR.',
            'discount_type.required' => 'The discount type is required.',
            'discount_type.in' => 'The discount type must be Fixed or Percentage.',
            'discount.required' => 'The discount is required.',
            'discount.numeric' => 'The discount must be a number.',
            'discount.min' => 'The discount cannot be negative.',
            'limitation_invoices.numeric' => 'The limitation invoices must be a number.',
            'limitation_invoices.min' => 'The limitation invoices cannot be negative.',
            'max_users.numeric' => 'The max users must be a number.',
            'max_users.min' => 'The max users cannot be negative.',
            'product.max' => 'The product name must not exceed 50 characters.',
            'supplier.max' => 'The supplier name must not exceed 50 characters.',
            'trial_days.numeric' => 'The trial days must be a number.',
            'trial_days.min' => 'The trial days cannot be negative.',
            'status.required' => 'The status is required.',
            'status.in' => 'The status must be active or inactive.',
            'modules.required' => 'At least one module must be selected.',
            'modules.*.exists' => 'One or more selected modules are invalid.',
            'roles.required' => 'At least one role must be selected.',
            'roles.*.exists' => 'One or more selected roles are invalid.',
        ];
    }

    // This Codes is mily used for Once, Error Raise , Reopen modal Automatically with Add plan modal only Open
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
