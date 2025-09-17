<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\SuperAdmin\Models\Company;

class LeaveType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'days',
        'icon',
        'bg_color',
        'badge_color',
        'status',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
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
