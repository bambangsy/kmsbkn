<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knowledge>
 */
class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueCombinationFound = false;
        $userId = null;
        $type = null;
        $taskId = null;

        while (!$uniqueCombinationFound) {
            $userId = User::inRandomOrder()->first()->id;
            $type = $this->faker->randomElement(['course', 'path']);
            $taskId = $type === 'course' ? \App\Models\Course::inRandomOrder()->first()->id : \App\Models\Path::inRandomOrder()->first()->id;

            $uniqueCombinationFound = !\App\Models\Progress::where([
                ['user_id', '=', $userId],
                ['type', '=', $type],
                ['task_id', '=', $taskId],
            ])->exists();
        }

        return [
            'user_id' => $userId,
            'type' => $type,
            'task_id' => $taskId,
        ];
    }
}
