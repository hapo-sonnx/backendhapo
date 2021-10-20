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
        $documentsLearned = Document::documentLearned($id)->get();
        $percentage = $documents->count() > 0 ? round($documentsLearned->count() / $documents->count() * 100) : 0;

        return view('lesson.index', compact('lessons', 'course', 'otherCourses', 'tags', 'numberStudent', 'teacher', 'documents', 'documentsLearned', 'percentage'));
    }

    public function search(Request $request, $id)
    {
        $course = Course::find($id);
        $tags = Course::tagsCourse($id)->get();
        $teacher = Course::teacherOfCourse($id)->get();
        $otherCourses = Course::showOtherCourses($course->id)->get();
        $lessons = Lesson::search($request->all())->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;
        $replies = ReplyReview::inforReply()->get();
        $reviews  = Feedback::feedbacksOfCourse($course->id)->get();
        $totalDocuments = !isNull($lessons->first()) ? Lesson::documentsOfLesson($lessons->first()->id)->get() : null;
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

        if (Auth::check() && !isNull($lessons->first())) {
            $documentsLearned = Document::documentLearned($lessons->first()->id)->get();
        } else {
            $documentsLearned = 0;
        }
        if (Auth::check() && !isNull($totalDocuments)) {
            if ($documentsLearned->count() != 0 && $totalDocuments->count() != 0) {
                $learnedPart = $documentsLearned->count() / $totalDocuments->count();
            } else {
                $learnedPart = 0;
            }
        } else {
            $learnedPart = 0;
        }

        $keyword = $request->has('key_detail_course') ? request()->get('key_detail_course') : null;

        return view('courses.courses_detail', compact('course', 'lessons', 'tags', 'otherCourses', 'reviews', 'teacher', 'keyword', 'isJoined', 'learnedPart', 'replies', 'totalDocuments', 'documentsLearned', 'userInfoMap'));
    }

    
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
