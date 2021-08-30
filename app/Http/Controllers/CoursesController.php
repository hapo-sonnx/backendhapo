<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $tags = Tag::all();
        return view('allcourses.index', compact('courses', 'tags'));
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
        return view('allcourses.index', compact('courses', 'tags', 'keyword'));
    }
}
