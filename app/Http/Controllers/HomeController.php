<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainCourses = Course::mainCourse()->get();
        $otherCourses = Course::otherCourse()->get();
        $totalUsers = User::where('role', config('constants.role.student'))->count();
        $totalCourses = Course::count();
        $totalLessons = Lesson::count();

        return view('home', compact('mainCourses', 'otherCourses', 'totalUsers', 'totalCourses', 'totalLessons'));
    }
}
