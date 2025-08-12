<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tracking extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'job_id',
        'latitude',
        'longitude'
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(static fn ($model) => $model->id = (string) Str::uuid());
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

