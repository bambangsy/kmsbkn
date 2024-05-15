<?php

namespace Database\Factories;
use App\Models\PathCourse;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class PathCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'path_id' => \App\Models\Path::inRandomOrder()->first()->id,
            'course_id' => \App\Models\Course::inRandomOrder()->first()->id,
        ];
        
    }
}
