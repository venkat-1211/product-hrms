<?php

namespace Modules\Hrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'holiday_id',
        'holiday_field_id',
        'value',
    ];

    public function holidayFields()
    {
        return $this->belongsTo(HolidayField::class);
    }
}
