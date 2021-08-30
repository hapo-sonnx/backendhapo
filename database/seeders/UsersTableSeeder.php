<?php
namespace App\Models;

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'HapoTester',
            'email' => 'test@hapo.com',
            'password' => bcrypt('test@haposoft.com'),
        ]);
    }
}
