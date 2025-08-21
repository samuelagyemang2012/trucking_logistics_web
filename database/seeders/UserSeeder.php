<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => "1234509896",
            'address' => '4 Dansoman Downtown Street',
            'role_id' => 1,
            'status' => 12
        ]);
    }
}
