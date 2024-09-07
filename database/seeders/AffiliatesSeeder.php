<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AffiliatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('affiliates')->insert([
            'user_id' => 1,
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('affiliates')->insert([
            'user_id' => 2,
            'parent_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('affiliates')->insert([
            'user_id' => 3,
            'parent_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('affiliates')->insert([
            'user_id' => 4,
            'parent_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('affiliates')->insert([
            'user_id' => 5,
            'parent_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('affiliates')->insert([
            'user_id' => 6,
            'parent_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('affiliates')->insert([
            'user_id' => 7,
            'parent_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
