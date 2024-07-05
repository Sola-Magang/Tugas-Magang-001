<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\profileData>
 */
class ProfileDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            // 'pos_id' => category::factory(),
            // 'pos_id' => rand(1,3),
            'pos_id' => function(){
                return category::inRandomOrder()->first()->id;
            },
            'slug' => Str::slug(fake()->name()) . rand(1,100),
            'place_birth'=>fake()->city(),
            'date_birth'=>fake()->date('Y-m-d'),
            'school'=>'SMK Harapan',
            'information'=>fake()->sentence(6)
        ];
    }
}
