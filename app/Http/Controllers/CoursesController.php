<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\Tag;
use App\Models\Lesson;
use App\Models\ReplyReview;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $tags = Tag::all();
        if ($request->has('key')) {
            $keyword = $request->get('key');
        } else {
            $keyword = '';
        }
        $courses = Course::filter($request->all())->paginate(config('constants.pagination'));
        return view('courses.index', compact('courses', 'tags', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course)
    {
        $lessons = $course->lessons()->WHERE('title', 'like', '%' . $request['key_detail_course'] . '%')->paginate(config('constants.pagination_lessons'));
        $reviews = $course->reviews()->get();
        $totalDocuments = Lesson::documentsOfLesson($lessons->first()->id)->get();
        $courseOthers = Course::OtherCourse()->get();
        if (Auth::check()) {
            $documentsLearned = Document::documentLearned($lessons->first()->id)->get();
        } else {
            $documentsLearned = 0;
        }
        if (Auth::check() && $documentsLearned->count() != 0 && $totalDocuments->count() != 0) {
            $learnedPart = $documentsLearned->count() / $totalDocuments->count();
        } else {
            $learnedPart = 0;
        }
        $replies = ReplyReview::inforReply()->get();
        return view('courses.courses_detail', compact('course', 'lessons', 'reviews', 'replies', 'courseOthers','totalDocuments', 'learnedPart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
