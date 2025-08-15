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
            ['category_id' => 1, 'name' => 'Pickup Trucks'],
            ['category_id' => 1, 'name' => 'Box Trucks'],
            ['category_id' => 1, 'name' => 'Flatbed Truck'],
            ['category_id' => 1, 'name' => 'Refrigerated Truck'],
            ['category_id' => 1, 'name' => 'Dump Truck'],
            ['category_id' => 1, 'name' => 'Tow Truck'],

            ['category_id' => 2, 'name' => 'Cargo Van'],
            ['category_id' => 2, 'name' => 'Minivan'],
            ['category_id' => 2, 'name' => 'Refrigerated Van'],

            ['category_id' => 3, 'name' => 'Car Carrier'],
            ['category_id' => 3, 'name' => 'Heavy Equipment Transporter'],
            ['category_id' => 3, 'name' => 'Hazardous Material Transporter'],
            ['category_id' => 3, 'name' => 'Armored Vehicle'],
            ['category_id' => 3, 'name' => 'Excavator'],
            ['category_id' => 3, 'name' => 'Dry Van Trailers'],

            ['category_id' => 4, 'name' => 'Flatbed Trailers'],
            ['category_id' => 4, 'name' => 'Refrigerated Trailers'],
            ['category_id' => 4, 'name' => 'Lowboy Trailers'],
            ['category_id' => 4, 'name' => 'Tank Trailers']
        ];

        DB::table('vehicle_types')->insert($types);
    }
}
