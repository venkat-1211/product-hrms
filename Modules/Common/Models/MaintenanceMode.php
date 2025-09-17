<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaintenanceMode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company_id', 'image', 'description', 'is_active'];
}
