<?php

namespace Modules\Hrm\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddNewFieldHolidayRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected $errorBag = 'addNewFieldHoliday';

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
            'key'          => ['required', 'string', 'max:255'],
            'label'        => ['required', 'string', 'max:255'],
            'type'         => ['required', 'string', 'in:text,textarea,date,datetime,select,multiselect,radio,checkbox,number,email,url,file,boolean'],
            'options'      => ['required_if:type,select,multiselect', 'nullable', 'array'],
            'visibility'   => ['nullable', 'array'],
            'validation'   => ['nullable', 'array'],
            'is_required'  => ['boolean'],
            'is_searchable'=> ['boolean'],
            'is_filterable'=> ['boolean'],
            'sort_order'   => ['required', 'integer', 'min:0'],
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
