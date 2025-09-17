<?php

namespace Modules\Common\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditLeaveTypeRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected $errorBag = 'EditLeaveType';

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
            'days' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'days.required' => 'Days is required.',
            'days.integer' => 'Days must be an integer.',
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
