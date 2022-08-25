<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->city(),
            'institution' => $this->faker->company(),
            'type' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Mahasiswa', 'Umum']),
            'total_visitors' => $this->faker->numberBetween(1, 10),
            'instagram' => $this->faker->userName(),
            'is_suggest' => $this->faker->numberBetween(1,1),
            'rate' => $this->faker->numberBetween(1,5),
            'suggestion' => $this->faker->paragraph(2),
            'created_at' => $this->faker->dateTimeThisYear('-1 months'),
            // 'updated_at' => $this->faker->dateTimeThisYear('-3 months'),
        ];
    }
}
