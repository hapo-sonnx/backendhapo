<?php

namespace Database\Seeders;

use App\Models\TagCourse;
use Illuminate\Database\Seeder;

class CoursesTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagCourse::factory()->count(14)->create();
    }
}
