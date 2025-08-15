<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name'=>'Automotive'],
            ['name'=>'Perishable Goods'],
            ['name'=>'Industrial Goods'],
            ['name'=>'Consumer Goods'],
            ['name'=>'Specialized Cargo']
        ];

        DB::table('product_categories')->insert($categories);
    }
}
