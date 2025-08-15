<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[
            ['name'=>'Trucks'],
            ['name'=>'Vans'],
            ['name'=>'Specialty Vehicles'],
            ['name'=>'Trailers']
        ];

        DB::table('vehicle_categories')->insert($categories);
    }
}
