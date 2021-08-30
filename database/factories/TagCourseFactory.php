<?php

namespace Database\Factories;

use App\Models\TagCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => 5,
            'course_id' => $this->faker->unique()->numberBetween(1, 40),
        ];
    }
}
