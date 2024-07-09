<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'SMK Harapan',
            'school_name' => 'SMK Harapan',
            'email' => 'harapan@smk.negeri',
            'password' => 'admin123.',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'name' => 'SMK Tunas',
            'school_name' => 'SMK Tunas',
            'email' => 'tunas@smk.negeri',
            'password' => 'admin123.',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
    }
}
