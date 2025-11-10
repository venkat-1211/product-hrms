<?php

namespace Modules\Hrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayField extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'key',
        'label',
        'type',
        'options',
        'visibility',
        'validation',
        'is_required',
        'is_searchable',
        'is_filterable',
        'sort_order',
    ];

    protected $casts = [
        'visibility' => 'array',
        // 'validation' => 'array',
    ];

    public const TYPES = [
        'text', 'textarea', 'date', 'datetime', 
        'select', 'multiselect', 'radio', 'checkbox', 
        'number', 'email', 'url', 'file', 'boolean'
    ];
}
