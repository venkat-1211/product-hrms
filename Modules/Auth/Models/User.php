<?php

namespace Modules\Auth\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Modules\Hrm\Models\Designation;
use Modules\Hrm\Models\Department;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements LaratrustUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndPermissions, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'company_id'
    ];

    protected $appends = ['status_color', 'status_icon'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getLaratrustTeamKeyName()
    {
        return 'company_id'; // Tells Laratrust the team key column
    }
    
    public function getLaratrustTeamKey()
    {
        session('current_company_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function company()
    {
        return $this->belongsTo(\Modules\SuperAdmin\Models\Company::class);
    }

    // Many-to-many relationship with Department (via pivot table)
    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(
            Department::class,
            'user_department',
            'user_id',
            'department_id'
        )->withTimestamps();
    }

    // One-to-one through pivot (if each user has only one department)
    public function department(): HasOneThrough
    {
        return $this->hasOneThrough(
            Department::class,
            \Illuminate\Support\Facades\DB::table('user_department')->getModel(),
            'user_id',        // Foreign key on user_department
            'id',             // Foreign key on departments table
            'id',             // Local key on users table
            'department_id'   // Local key on user_department table
        );
    }

    // Many-to-many relationship with Designation (via pivot)
    public function designations(): BelongsToMany
    {
        return $this->belongsToMany(
            Designation::class,
            'user_designation',
            'user_id',
            'designation_id'
        )->withTimestamps();
    }

    // If only one designation per user (use this instead of belongsTo)
    public function designation(): HasOneThrough
    {
        return $this->hasOneThrough(
            Designation::class,
            \Illuminate\Support\Facades\DB::table('user_designation')->getModel(),
            'user_id',
            'id',
            'id',
            'designation_id'
        );
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
