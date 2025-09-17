<?php

namespace Modules\Auth\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;

use Illuminate\Validation\Validator;
use Modules\SuperAdmin\Models\Company;

class LoginRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'              => 'nullable|string|email',
            'username'           => 'nullable|string',
            'phone'              => 'nullable|string',
            'username_or_email'  => 'nullable|string',
            'username_or_phone'  => 'nullable|string',
            'email_or_phone'     => 'nullable|string',
            'password'           => 'required|string',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function (Validator $validator) {
            $company = request()->route('company'); // ✅ Route model binding

            if (!$company) {
                // 🔐 Super Admin Login: email required
                if (!$this->filled('email')) {
                    $validator->errors()->add('email', 'Email is required for Super Admin login.');
                }
                return;
            }

            // ✅ Company Login: validate by login method
            $loginMethod = $company->login_method;

            match ($loginMethod) {
                'username'           => $this->requireField($validator, 'username'),
                'email'              => $this->requireField($validator, 'email', true),
                'phone'              => $this->requireField($validator, 'phone'),
                'username_or_email'  => $this->requireField($validator, 'username_or_email'),
                'username_or_phone'  => $this->requireField($validator, 'username_or_phone'),
                'email_or_phone'     => $this->requireField($validator, 'email_or_phone'),
                default              => $validator->errors()->add('login_method', 'Invalid login method.'),
            };
        });
    }

    protected function requireField($validator, string $field, bool $mustBeEmail = false): void
    {
        if (!$this->filled($field)) {
            $validator->errors()->add($field, ucfirst(str_replace('_', ' ', $field)) . ' is required.');
        } elseif ($mustBeEmail && !filter_var($this->input($field), FILTER_VALIDATE_EMAIL)) {
            $validator->errors()->add($field, 'Invalid email format.');
        }
    }
}



