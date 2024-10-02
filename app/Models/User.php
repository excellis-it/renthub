<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'username',
        'gender',
        'email',
        'password',
        'photo',
        'address',
        'phone_number',
        'country',
        'state',
        'city',
        'zip_code',
        'govt_id_type',
        'govt_id_file',
        'role',
        'status',
        'company_name',
        'corporate_id',
        'tax_id',
        'social_id',
        'social_type',
        'industry',
        'remember_token',
        'created_at',
        'updated_at'
    ];

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
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    
}
