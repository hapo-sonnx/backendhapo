<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\Tag;
use App\Models\User;
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
        $tags = Tag::all();
        $courses = Course::filter($request->all())->paginate(config('constants.pagination'));
        return view('courses.index', compact('courses', 'tags', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $tags = Course::tagsCourse($id)->get();
        $otherCourses = Course::showOtherCourses($course->id)->get();
        $teacher = Course::teacherOfCourse($id)->get();
        $lessons = Course::inforLessons($id)->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;
        $reviews = Course::find($id)->reviews;
        $totalDocuments = Lesson::documentsOfLesson($lessons->first()->id)->get();
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
        return view('courses.courses_detail', compact('course', 'lessons', 'teacher', 'tags', 'otherCourses', 'isJoined', 'reviews', 'userInfoMap', 'replies', 'totalDocuments', 'learnedPart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function join($id)
    {
        $course = Course::find($id);
        $course->users()->attach(Auth::id());

        return back();
    }

    public function leave($id)
    {
        $course = Course::find($id);
        $course->users()->detach(Auth::id());
        return redirect()->route('courses.index');
    }
}
