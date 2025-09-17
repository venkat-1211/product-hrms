<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Parent module (recursive inverse)
     */
    public function parent()
    {
        return $this->belongsTo(Module::class, 'parent_id');
    }

    /**
     * Immediate children (recursive)
     */
    // public function children()
    // {
    //     return $this->hasMany(Module::class, 'parent_id')
    //         ->where('is_active', true)
    //         ->orderBy('id')
    //         ->with('children'); // Recursive eager loading
    // }

    public function childrenRecursive()
    {
        return $this->hasMany(Module::class, 'parent_id')
            ->where('is_active', true)
            ->with('childrenRecursive');
    }
    
}
