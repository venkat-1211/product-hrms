<?php

namespace Modules\Hrm\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddHolidayRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     protected $errorBag = 'addHoliday';

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
        $company = $this->route('company'); // assuming {company} is in route model binding

        $rules = [];

        if ($company && $company->holidayFields) {
            foreach (
                $company->holidayFields()
                    ->whereJsonContains('visibility->form', true)
                    ->get() as $field
            ) {
                // decode validation JSON (e.g. ["required","string"])
                $validation = json_decode($field->validation, true) ?? [];

                $rules[$field->key] = $validation;
            }
        }

        return $rules;
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
