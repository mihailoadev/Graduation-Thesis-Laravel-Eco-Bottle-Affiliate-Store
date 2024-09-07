<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Mihailo Anđelić',            
            'address' => 'Vrbaska 7',
            'email' => 'mihailo' . '@email.com',
            'image' => null,
            'referral_code' => generateReferralCode(),
            'status' => 1, 
            'email_verified_at' => now(),
            'password' => Hash::make('Mihailo1234'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Marko Marković',            
            'address' => 'Jurija Gagarina 29/2',
            'email' => 'marko' . '@email.com',
            'image' => null,
            'referral_code' => generateReferralCode(),
            'status' => 1, 
            'email_verified_at' => now(),
            'password' => Hash::make('Marko1234'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Ana Anić',            
            'address' => 'Kursulina 8',
            'email' => 'ana' . '@email.com',
            'image' => null,
            'referral_code' => generateReferralCode(),
            'status' => 1, 
            'email_verified_at' => now(),
            'password' => Hash::make('Ana123456'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Petar Petrović',            
            'address' => 'Krunska 51',
            'email' => 'petar' . '@email.com',
            'image' => null,
            'referral_code' => generateReferralCode(),
            'status' => 1, 
            'email_verified_at' => now(),
            'password' => Hash::make('Petar1234'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Anastasija Jovanović',            
            'address' => 'Vojvode Stepe 283',
            'email' => 'anastasija' . '@email.com',
            'image' => null,
            'referral_code' => generateReferralCode(),
            'status' => 1, 
            'email_verified_at' => now(),
            'password' => Hash::make('Anastasija1234'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Jovana Jovanović',            
            'address' => 'Cara Dušana 18',
            'email' => 'jovana' . '@email.com',
            'image' => null,
            'referral_code' => generateReferralCode(),
            'status' => 1, 
            'email_verified_at' => now(),
            'password' => Hash::make('Jovana1234'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Nikola Nikolić',            
            'address' => 'Bulevar Kralja Aleksandra 240',
            'email' => 'nikola' . '@email.com',
            'image' => null,
            'referral_code' => generateReferralCode(),
            'status' => 1, 
            'email_verified_at' => now(),
            'password' => Hash::make('Nikola1234'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
