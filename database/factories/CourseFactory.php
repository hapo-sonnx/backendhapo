<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name,
            'logo_path' => $this->faker->unique()->imageUrl,
            'quizzes' => $this->faker->numberBetween(100, 10000),
            'price' => $this->faker->randomFloat(2, 0, 1000000),
            'description' => $this->faker->paragraph
        ];
    }
}
