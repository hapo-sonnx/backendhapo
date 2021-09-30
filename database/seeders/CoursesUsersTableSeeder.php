<?php

namespace Database\Seeders;

use App\Models\UserCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCourse::factory()->count(3500)->create();
    }
}
