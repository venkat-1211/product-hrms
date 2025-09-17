<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthenticationSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'allow_registration',
        'verification_required',
        'login_type',
        'verification_expired',
        'referral_system',
        'password_enabled',
        'otp_system',
        'otp_type',
    ];
}
