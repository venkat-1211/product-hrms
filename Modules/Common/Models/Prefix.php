<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prefix extends Model
{
    use HasFactory, softDeletes;

    protected $casts = [
        'data' => 'array', // auto convert JSON <-> array
    ];

    protected $fillable = [
        'company_id',
        'data',
    ];
}
