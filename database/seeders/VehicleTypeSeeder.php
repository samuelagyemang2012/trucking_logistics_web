<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['vehicle_category_id' => 1, 'name' => 'Pickup Truck'],
            ['vehicle_category_id' => 1, 'name' => 'Box Truck'],
            ['vehicle_category_id' => 1, 'name' => 'Flatbed Truck'],
            ['vehicle_category_id' => 1, 'name' => 'Refrigerated Truck'],
            ['vehicle_category_id' => 1, 'name' => 'Dump Truck'],
            ['vehicle_category_id' => 1, 'name' => 'Tow Truck'],

            ['vehicle_category_id' => 2, 'name' => 'Cargo Van'],
            ['vehicle_category_id' => 2, 'name' => 'Minivan'],
            ['vehicle_category_id' => 2, 'name' => 'Refrigerated Van'],

            ['vehicle_category_id' => 3, 'name' => 'Car Carrier'],
            ['vehicle_category_id' => 3, 'name' => 'Heavy Equipment Transporter'],
            ['vehicle_category_id' => 3, 'name' => 'Hazardous Material Transporter'],
            ['vehicle_category_id' => 3, 'name' => 'Armored Vehicle'],
            ['vehicle_category_id' => 3, 'name' => 'Excavator'],
            ['vehicle_category_id' => 3, 'name' => 'Dry Van Trailer'],

            ['vehicle_category_id' => 4, 'name' => 'Flatbed Trailer'],
            ['vehicle_category_id' => 4, 'name' => 'Refrigerated Trailer'],
            ['vehicle_category_id' => 4, 'name' => 'Lowboy Trailer'],
            ['vehicle_category_id' => 4, 'name' => 'Tank Trailer']
        ];

        DB::table('vehicle_types')->insert($types);
    }
}
