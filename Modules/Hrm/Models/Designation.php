<?php

namespace Modules\Hrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'department_id',
        'name',
        'display_name',
        'description',
        'is_active'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
