<?php

namespace Modules\Common\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;

class UpdatePrefixRequest extends BaseFormRequest
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
            'prefix' => 'required|array',               // must be an array
            'prefix.*' => 'required|string|max:50',    // each value required and must be a string
        ];
    }

    public function messages(): array
    {
        return [
            'prefix.required' => 'Prefix data is required.',
            'prefix.array' => 'Invalid prefix format.',
            'prefix.*.required' => 'Each prefix value is required.',
            'prefix.*.string' => 'Each prefix must be a valid string.',
            'prefix.*.max' => 'Each prefix cannot exceed 50 characters.',
        ];
    }
}
