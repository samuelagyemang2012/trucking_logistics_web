<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'email',
        'tin_number',
        // 'telephone',
        // 'address',
        'company_certificate'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($model) => $model->id = (string) Str::uuid());

        static::deleting(function ($company) {
            $company->vehicles()->each(function ($vehicles) {
                $vehicles->delete();
            });

            $company->drivers()->each(function ($drivers) {
                $drivers->delete();
            });
        });

        static::restoring(function ($company) {
            $company->vehicles()->each(function ($vehicles) {
                $vehicles->delete();
            });

            $company->drivers()->each(function ($drivers) {
                $drivers->delete();
            });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
}
