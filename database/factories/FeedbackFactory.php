<?php

namespace Database\Factories;

// use App\Models\Model;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'course_id' => $this->faker->numberBetween(1, 50),
            'lesson_id' => null,
            'content' => $this->faker->realText(),
            'rate' => $this->faker->randomFloat(1, 3.5, 5)
        ];
    }
}
