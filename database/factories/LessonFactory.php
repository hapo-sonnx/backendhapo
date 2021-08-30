<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => Course::all()->random()->id,
            'title' => $this->faker->unique()->name,
            'description' => $this->faker->paragraph,
            'requirement' => $this->faker->paragraph,
            'time' => $this->faker->numberBetween(20, 100),
        ];
    }
}
