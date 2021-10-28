<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   
    public function reviewcourse(Request $request)
    {
        return Feedback::create([
            'content' => $request['content'],
            'rate' => $request['rate'],
            'course_id' => $request['course_id'],
            'date_times' => date("Y-m-d H:i:s"),
            'user_id' => Auth::id(),
        ]);
    }

    public function reviewlesson(Request $request)
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
