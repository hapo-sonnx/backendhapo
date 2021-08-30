<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Feedback;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()->count(40)->create();
    }
}
