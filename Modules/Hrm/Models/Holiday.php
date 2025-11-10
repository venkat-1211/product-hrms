<?php

namespace Modules\Hrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holiday extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
    ];

    public function meta()
    {
        return $this->hasMany(HolidayMeta::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function holidayFields()
    {
        return $this->hasMany(HolidayField::class);
    }
}
