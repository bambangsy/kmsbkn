<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knowledge>
 */
class KnowledgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'file' => $this->faker->randomElement(['demo_content/doc1.pdf', 'demo_content/doc2.pdf']),
            'user_id' => $this->faker->numberBetween(1, 15),
            'status' => $this->faker->numberBetween(0, 1),
            'created_at' => $this->faker->dateTimeBetween('-2 days', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-2 days', 'now'),
            'validated_at' => $this->faker->dateTimeBetween('-2 days', 'now'),
            'is_currently_checked_by' => $this->faker->numberBetween(1, 15),
        ];
    }
}
