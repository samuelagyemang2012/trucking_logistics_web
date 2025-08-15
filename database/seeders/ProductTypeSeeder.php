<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products_types = [
            ['category_id'=>1,'name'=>'Passenger Vehicles'],
            ['category_id'=>1,'name'=>'Motorcycles'],
            ['category_id'=>1,'name'=>'Auto Parts'],

            ['category_id'=>2,'name'=>'Fresh Produce'],
            ['category_id'=>2,'name'=>'Frozen Foods'],
            ['category_id'=>2,'name'=>'Pharmaceuticals'],
            ['category_id'=>2,'name'=>'Dairy Products'],

            ['category_id'=>3,'name'=>'Machinery'],
            ['category_id'=>3,'name'=>'Construction Materials'],
            ['category_id'=>3,'name'=>'Heavy Equipment'],
            ['category_id'=>3,'name'=>'Steel Products'],

            ['category_id'=>4,'name'=>'Electronics'],
            ['category_id'=>4,'name'=>'Furniture'],
            ['category_id'=>4,'name'=>'Clothing'],
            ['category_id'=>4,'name'=>'Packaged Goods'],

            ['category_id'=>5,'name'=>'Hazardous Materials'],
            ['category_id'=>5,'name'=>'Livestock'],
            ['category_id'=>5,'name'=>'Clothing'],
            ['category_id'=>5,'name'=>'Luxury Goods'],
        ];

        DB::table('product_types')->insert($products_types);
    }
}
