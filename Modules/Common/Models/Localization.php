<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $casts = [
        'currency_info' => 'array', // auto convert JSON <-> array
        'country_settings' => 'array', // auto convert JSON <-> array
        'file_settings' => 'array', // auto convert JSON <-> array
        'others' => 'array', // auto convert JSON <-> array
    ];

    protected $fillable = [
        'company_id',
        'currency_info',
        'country_settings',
        'file_settings',
        'others',
    ];
}
