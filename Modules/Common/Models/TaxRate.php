<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\SuperAdmin\Models\Company;

class TaxRate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'rate',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
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
