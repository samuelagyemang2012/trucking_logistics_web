<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable = ['vehicle_category_id', 'name'];

    public function vehicleCategory()
    {
        return $this->belongsTo(VehicleCategory::class, 'vehicle_category_id', 'id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'type', 'id');
    }
}
