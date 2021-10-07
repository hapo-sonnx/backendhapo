<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Feedback;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $tags = Tag::all();
        return view('courses.index', compact('courses', 'tags'));
    }

    public function search(Request $request)
    {
        if ($request->has('key')) {
            $keyword = $request->get('key');
        } else {
            $keyword = '';
        }
        $tags = Tag::all();
        $courses = Course::filter($request->all())->paginate(config('constants.pagination'));
        return view('courses.index', compact('courses', 'tags', 'keyword'));
    }

    public function detail($id)
    {
        $course = Course::find($id);
        $tags = Course::tagsCourse($id)->get();
        $otherCourses = Course::showOtherCourses($course->id)->get();
        $teacher = Course::teacherOfCourse($id)->get();
        $lessons = Course::inforLessons($id)->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;
        $reviews = Course::find($id)->reviews;
        $userIds = [];
        if (!empty($reviews)) {
            foreach ($reviews as $review) {
                $userIds[] = $review['user_id'];
            }
        }
        $userInfos = User::whereIn('id', $userIds)->select('name', 'id')->get();
        $userInfoMap = [];
        if (!empty($userInfos)) {
            foreach ($userInfos as $userInfo) {
                $userInfoMap[$userInfo->id] = $userInfo;
            }
        }
        return view('courses.courses_detail', compact('course', 'lessons', 'teacher', 'tags', 'otherCourses', 'isJoined', 'reviews', 'userInfoMap'));
    }

    public function join($id)
    {
        $course = Course::find($id);
        $course->users()->attach(Auth::id());
        return redirect()->route('courses.detail', [$id]);
    }

    public function addreview(Request $request)
    {
        return Feedback::create([
            'content' => $request['content'],
            'rate' => $request['rate'],
            'course_id' => $request['course_id'],
            'date_times' => date("Y-m-d H:i:s"),
            'user_id' => Auth::id(),
        ]);
    }

    public function leave($id)
    {
        $course = Course::find($id);
        $course->users()->detach(Auth::id());
        return redirect()->route('courses');
    }
}
