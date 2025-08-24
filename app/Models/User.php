<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Queue\SerializesModels;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, SerializesModels;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'google_id',
        'email',
        'profile_picture',
        'gender',
        'telephone',
        'national_id',
        'id_number',
        'address',
        'role_id',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->id = (string) Str::uuid());
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'customer_id');
    }

    public function assignedJobs()
    {
        return $this->hasMany(JobAssignment::class, 'driver_id');
    }
}
