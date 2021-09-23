<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Document;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id)
    {
        $lessons = Lesson::find($id);
        $lessons->users()->attach(Auth::id());
        $course = Lesson::courseOfLesson($id)->first();
        $otherCourses = Course::limit(5)->get();
        $tags = Course::tagsCourse($course->id)->get();
        $teacher = Course::teacherOfCourse($course->id)->get();
        $numberStudent = Course::where('courses.id', $course->id)->first();
        $documents = Lesson::documentsOfLesson($id)->get();
        // dd ($documents);

        return view('lesson.index', compact('lessons', 'course', 'otherCourses', 'tags', 'numberStudent', 'teacher', 'documents'));
    }

    public function search(Request $request, $id)
    {
        $course = Course::find($id);
        $tags = Course::tagsCourse($id)->get();
        $otherCourses = Course::showOtherCourses($course->id)->get();
        $lessons = Lesson::search($request->all())->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;

        if ($request->has('key_detail_course')) {
            $keyword = request()->get('key_detail_course');
        }

        return view('courses.courses_detail', compact('course', 'lessons', 'tags', 'otherCourses', 'keyword', 'isJoined'));
    }
}
