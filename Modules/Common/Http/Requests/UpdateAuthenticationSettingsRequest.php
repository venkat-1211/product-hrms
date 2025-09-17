<?php

namespace Modules\Common\Http\Requests;

use Modules\Common\Http\Requests\BaseFormRequest;

class UpdateAuthenticationSettingsRequest extends BaseFormRequest
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
            'allow_registration' => 'required|in:on,off,invite_only',
            'verification_required' => 'required|boolean',
            'verification_expired' => 'nullable|integer',
            'referral_system' => 'required|boolean',
            'login_type' => 'required|in:email,username,phone,username_or_email,username_or_phone,email_or_phone',
            'password_enabled' => 'required|boolean',
            'otp_system' => 'required|boolean',
            'otp_type' => 'nullable|in:sms,email',
        ];
    }
}
