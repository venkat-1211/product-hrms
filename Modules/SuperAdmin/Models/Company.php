<?php

namespace Modules\SuperAdmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Auth\Models\User;
use Modules\Common\Models\Prefix;
use Modules\Common\Models\Localization;
use Modules\Common\Models\AuthenticationSetting;
use Modules\Common\Models\LeaveType;
use Modules\Common\Models\MaintenanceMode;
use Modules\Hrm\Models\HolidayField;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'account_url',
        'phone',
        'address',
        'website',
        'login_method',
        'package_id',
        'type',
        'currency',
        'status'
    ];

    // public function getLoginMethodAttribute($value) {
    //    //
    // }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prefix()
    {
        return $this->hasOne(Prefix::class);
    }

    public function localization()
    {
        return $this->hasOne(Localization::class);
    }

    public function authenticationSetting()
    {
        return $this->hasOne(AuthenticationSetting::class);
    }

    public function maintenanceMode()
    {
        return $this->hasOne(MaintenanceMode::class);
    }

    public function leaveTypes()
    {
        return $this->hasMany(LeaveType::class);
    }

    public function holidays()
    {
        return $this->hasMany(Holiday::class);
    }

    public function holidayFields()
    {
        return $this->hasMany(HolidayField::class);
    }

    public function getStatusColorAttribute(): string
    {
        return $this->status === 'Active' ? 'success' : 'danger';
    }
    
    public function getStatusIconAttribute(): string
    {
        return $this->status === 'Active' ? 'ti ti-point-filled' : 'ti ti-alert-circle';
    }
}
