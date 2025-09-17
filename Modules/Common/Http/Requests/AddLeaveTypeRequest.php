<?php

namespace Modules\Common\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddLeaveTypeRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected $errorBag = 'addLeaveType'; // Tell Laravel to store validation errors in this named bag

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
            'bg_color' => 'required|string',
            'badge_color' => 'required|string',
            'icon' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'days.required' => 'Days is required.',
            'days.integer' => 'Days must be an integer.',
            'bg_color.required' => 'Background Color is required.',
            'bg_color.string' => 'Background Color must be a string.',
            'badge_color.required' => 'Badge Color is required.',
            'badge_color.string' => 'Badge Color must be a string.',
            'icon.string' => 'Icon must be a string.',
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
