<?php

namespace Modules\Common\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;

class AddLocalizationRequest extends BaseFormRequest
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
            'language' => 'required|string',
            'language_switcher' => 'nullable|boolean',
            'timezone' => 'required|string',
            'date_format' => 'required|string',
            'time_format' => 'required|string',
            'financial_year' => 'required|string',
            'starting_month' => 'required|string',
            'currency' => 'required|string',
            'currency_symbol' => 'required|string',
            'currency_position' => 'required|string',
            'decimal_seperator' => 'required|string',
            'thousand_seperator' => 'required|string',
            'countries_restriction' => 'required|string',
            'allowed_files' => 'required|array',
            'max_file_size' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'launguage.required' => 'Language is required.',
            'launguage.string' => 'Language must be a string.',
            'launguage_switcher.boolean' => 'Language switcher must be a boolean.',
            'timezone.required' => 'Timezone is required.',
            'timezone.string' => 'Timezone must be a string.',
            'date_format.required' => 'Date format is required.',
            'date_format.string' => 'Date format must be a string.',
            'time_format.required' => 'Time format is required.',
            'time_format.string' => 'Time format must be a string.',
            'financial_year.required' => 'Financial year is required.',
            'financial_year.string' => 'Financial year must be a string.',
            'starting_month.required' => 'Starting month is required.',
            'starting_month.string' => 'Starting month must be a string.',
            'currency.required' => 'Currency is required.',
            'currency.string' => 'Currency must be a string.',
            'currency_symbol.required' => 'Currency symbol is required.',
            'currency_symbol.string' => 'Currency symbol must be a string.',
            'currency_position.required' => 'Currency position is required.',
            'currency_position.string' => 'Currency position must be a string.',
            'decimal_seperator.required' => 'Decimal seperator is required.',
            'decimal_seperator.string' => 'Decimal seperator must be a string.',
            'thousand_seperator.required' => 'Thousand seperator is required.',
            'thousand_seperator.string' => 'Thousand seperator must be a string.',
            'countries_restriction.required' => 'Countries restriction is required.',
            'countries_restriction.string' => 'Countries restriction must be a string.',
            'allowed_files.required' => 'Allowed files is required.',            
            'allowed_files.array' => 'Allowed files must be an array.',
            'max_file_size.required' => 'Max file size is required.',
            'max_file_size.integer' => 'Max file size must be an integer.',
        ];
    }
}
