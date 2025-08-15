<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Pending'],
            ['name' => 'Accepted'],
            ['name' => 'Declined'],
            ['name' => 'Driver Inbound'],
            ['name' => 'Driver Loading'],
            ['name' => 'In Transit'],
            ['name' => 'Delivered'],
            ['name' => 'Available'],
            ['name' => 'Under Maintenance'],
            ['name' => 'Out of Service'],
            ['name' => 'Active'],
            ['name' => 'Inactive']
        ];

        DB::table('status')->insert($statuses);
    }
}
