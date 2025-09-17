<?php

namespace Modules\Common\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddTaxRateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected $errorBag = 'addTaxRate'; // Tell Laravel to store validation errors in this named bag

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
            'name' => 'required|string',
            'rate' => 'required|numeric',
            'status' => 'required|string|in:Active,Inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'rate.required' => 'Rate is required',
            'rate.numeric' => 'Rate must be a number',
            'status.required' => 'Status is required',
            'status.in' => 'Status must be Active or Inactive',
        ];
    }

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
