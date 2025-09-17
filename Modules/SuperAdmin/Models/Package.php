<?php

namespace Modules\SuperAdmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Common\Models\Module;
use Modules\Auth\Models\Role;
use Modules\Hrm\Models\Department;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'type', 'position', 'price', 'currency', 'discount_type', 'discount', 'description', 'limitation_invoices','max_users','product','supplier','access_trial','trial_days','is_recommended','ui_customize','status'
    ];

    protected $appends = ['status_color', 'status_icon'];

    // Relationships
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_package', 'package_id', 'module_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_package', 'package_id', 'role_id');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'package_department', 'package_id', 'department_id');
    }

    // Accessors
    // public function getStatusAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    public function getStatusColorAttribute(): string
    {
        return $this->status === 'Active' ? 'success' : 'danger';
    }
    
    public function getStatusIconAttribute(): string
    {
        return $this->status === 'Active' ? 'ti ti-point-filled' : 'ti ti-alert-circle';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}
