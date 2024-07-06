<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::create([
            'pos_name' => 'Siswa',
            'slug'=>'siswa',
            'color'=>'blue'
        ]);

        category::create([
            'pos_name' => 'Guru',
            'slug'=>'guru',
            'color'=>'yellow'
        ]);
        
        category::create([
            'pos_name' => 'karyawan',
            'slug'=>'karyawan',
            'color'=>'green'
        ]);
    }
}
