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
            ['product_category_id'=>1,'name'=>'Passenger Vehicles'],
            ['product_category_id'=>1,'name'=>'Motorcycles'],
            ['product_category_id'=>1,'name'=>'Auto Parts'],

            ['product_category_id'=>2,'name'=>'Fresh Produce'],
            ['product_category_id'=>2,'name'=>'Frozen Foods'],
            ['product_category_id'=>2,'name'=>'Pharmaceuticals'],
            ['product_category_id'=>2,'name'=>'Dairy Products'],

            ['product_category_id'=>3,'name'=>'Machinery'],
            ['product_category_id'=>3,'name'=>'Construction Materials'],
            ['product_category_id'=>3,'name'=>'Heavy Equipment'],
            ['product_category_id'=>3,'name'=>'Steel Products'],

            ['product_category_id'=>4,'name'=>'Electronics'],
            ['product_category_id'=>4,'name'=>'Furniture'],
            ['product_category_id'=>4,'name'=>'Clothing'],
            ['product_category_id'=>4,'name'=>'Packaged Goods'],

            ['product_category_id'=>5,'name'=>'Hazardous Materials'],
            ['product_category_id'=>5,'name'=>'Livestock'],
            ['product_category_id'=>5,'name'=>'Clothing'],
            ['product_category_id'=>5,'name'=>'Luxury Goods'],
        ];

        DB::table('product_types')->insert($products_types);
    }
}
