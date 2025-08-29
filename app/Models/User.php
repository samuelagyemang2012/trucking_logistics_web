<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Queue\SerializesModels;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, SerializesModels, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'google_id',
        'email',
        'password',
        'profile_picture',
        'gender',
        'telephone',
        'national_id',
        'id_number',
        'address',
        'role_id',
        'status',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(fn($model) => $model->id = (string) Str::uuid());

        static::deleting(function ($user) {
            $user->company()->delete();
        });

        static::restoring(function ($user) {
            // Restore all comments associated with this post
            $user->company()->restore();
        });
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

    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }
}
