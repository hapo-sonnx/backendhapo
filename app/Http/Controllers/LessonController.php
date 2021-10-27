<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Document;
use App\Models\UserCourse;
use App\Models\Feedback;
use App\Models\ReplyReview;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    }

    public function show($id)
    {
        $lessons = Lesson::find($id);
        $lessons->users()->attach(Auth::id());
        $course = Lesson::courseOfLesson($id)->first();
        $otherCourses = Course::limit(5)->get();
        $tags = Course::tagsCourse($course->id)->get();
        $teacher = Course::teacherOfCourse($course->id)->get();
        $numberStudent = Course::where('courses.id', $course->id)->first();
        $documents = Lesson::documentsOfLesson($id)->get();
        $documentsLearned = Document::documentLearned($id)->get();
        $percentage = $documents->count() > 0 ? round($documentsLearned->count() / $documents->count() * 100) : 0;

        return view('lesson.index', compact('lessons', 'course', 'otherCourses', 'tags', 'numberStudent', 'teacher', 'documents', 'documentsLearned', 'percentage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addreviewlesson(Request $request)
    {
        return Feedback::create([
            'content' => $request['content'],
            'rate' => $request['rate'],
            'lesson_id' => $request['lesson_id'],
            'date_times' => date("Y-m-d H:i:s"),
            'user_id' => Auth::id(),
        ]);
    }
}
