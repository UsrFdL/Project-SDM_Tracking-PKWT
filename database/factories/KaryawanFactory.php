<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $min = 10000000000;
        $max = 99999999999;

        return [
            'nama' => fake()->name(),
            'nik' => fake()->numberBetween($min, $max),
            'nip' => fake()->numberBetween($min, $max),
            'divisi_id' => fake()->numberBetween(1, 13),
            'departemen_id' => fake()->numberBetween(1, 36),
            'bagian_id' => fake()->numberBetween(1, 100),
        ];
    }
}
