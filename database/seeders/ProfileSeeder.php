<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'id' => 1,
            'name' => 'JOHN DOE',
            'age' => 30,
            'city' => 'NEW YORK',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
