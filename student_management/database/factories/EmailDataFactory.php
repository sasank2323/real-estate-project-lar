<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EmailData;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmailData>
 */
class EmailDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EmailData::class;
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'subject' => $this->faker->sentence(5),
            'message' => $this->faker->paragraph(3),
            'created_at' => now(),
        ];
    }
}
