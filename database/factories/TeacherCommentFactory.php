<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherComment>
 */
class TeacherCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'teacher_id' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]),
            'text' => fake()->text(144),
            'rating' => fake()->randomElement([1, 2, 3, 4, 5, 2, 3, 1, 1]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
