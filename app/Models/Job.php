<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'customer_id',
        'product_type',
        'vehicle_requirement',
        'weight',
        'height',
        'width',
        'breadth',
        'image',
        'vehicle_type',
        'number_of_vehicles',
        'pickup_date',
        'pickup_point',
        'destination_point',
        'price',
        'insurance_package',
        'status',
        'decline_reason'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn ($model) => $model->id = (string) Str::uuid());
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function assignments()
    {
        return $this->hasMany(JobAssignment::class);
    }

    public function tracking()
    {
        return $this->hasMany(Tracking::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

