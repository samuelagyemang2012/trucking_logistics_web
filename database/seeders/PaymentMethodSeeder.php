<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            ["name" => "MoMo"],
            ["name" => "Card"],
            ["name" => "Bank Transfer"],
            ["name" => "Paypal"]
        ];

        DB::table('payment_methods')->insert($methods);
    }
}
