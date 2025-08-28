<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;
    protected $table='job_offers';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'customer_id',
        'product_type_id',
        'vehicle_requirement',
        'weight',
        'height',
        'width',
        'breadth',
        'image',
        'vehicle_type_id',
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

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function productType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }
    public function vehicleType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(vehicleType::class);
    }

    public function assignments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobAssignment::class);
    }

    public function tracking(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tracking::class);
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Payment::class);
    }
}

