<?php

namespace Modules\SuperAdmin\Http\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PercentageValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $discountType = request()->input('discount_type');

        if ($discountType === 'Percentage' && ($value < 0 || $value > 100)) {
            $fail('The discount must be between 0 and 100 when the discount type is Percentage.');
        }
    }
}
