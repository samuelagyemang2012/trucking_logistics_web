<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    protected $fillable = ['name'];

    public function vehicleTypes()
    {
        return $this->hasMany(VehicleType::class, 'vehicle_category_id', 'id');
    }
}
