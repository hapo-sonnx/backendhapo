<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'logo_path',
        'learners',
        'times',
        'quizzes',
        'tag',
        'price',
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id');
    }

    public function getNumberUserStudentAttribute()
    {
        return $this->users()->where('role', config('constants.role.student'))->count();
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function getNumberLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function scopeInforLessons($query, $id)
    {
        $query->join('lessons', 'courses.id', '=', 'lessons.course_id')
            ->select('lessons.*')
            ->where('lessons.course_id', '=', $id);
    }

    public function getCourseTimeAttribute()
    {
        $totalTimeCourse = $this->lessons()->sum('time');
        $hour = round($totalTimeCourse / config('constants.hour'));

        return $hour;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_courses', 'course_id', 'tag_id');
    }

    public function scopeTagsCourse($query, $id)
    {
        $query->leftJoin('tag_courses', 'courses.id', 'tag_courses.course_id')
            ->leftJoin('tags', 'tag_courses.tag_id', 'tags.id')
            ->where('tag_courses.course_id', $id);
    }

    public function reviews()
    {
        return $this->hasMany(Feedback::class, 'course_id');
    }

    public function getNumberReviewAttribute()
    {
        return $this->reviews()->count();
    }

    public function getTotalRateAttribute()
    {
        return ceil($this->reviews()->avg('rate'));
    }

    public function getNumberRateAttribute(){
        return $this->reviews()
        ->selectRaw('count(*) as total, rate')
        ->groupBy('rate')
        ->get();
    }

    public function scopeTeacherOfCourse($query, $id)
    {
        $query->leftJoin('user_courses', 'courses.id', 'user_courses.course_id')
            ->leftJoin('users', 'user_courses.user_id', 'users.id')
            ->where('users.role',config('constants.role.teacher'))
            ->where('user_courses.course_id', $id);
    }

    public function scopeFilter($query, $data)
    {
        if (isset($data['key'])) {
            $query->where('title', 'like', '%' . $data['key'] . '%')
                ->orWhere('description', 'like', '%' . $data['key'] . '%');
        }

        if (isset($data['sort'])) {
             ($data['sort'] == config('constants.options.newest')) ? $query->orderByDesc('id') : $query->orderBy('id');
        }

        if (isset($data['learner'])) {
            $query->withCount([
                'users' => function ($subquery) {
                    $subquery->where('role',config('constants.role.student'));
                }
            ]);
            ($data['learner'] == config('constants.options.ascending')) ? $query->orderBy('users_count') : $query->orderByDesc('users_count');
        }

        if (isset($data['times'])) {
            $query = $query->withSum('lessons', 'time');
             ($data['times'] == config('constants.options.ascending')) ? $query->orderBy('lessons_sum_time') : $query->orderByDesc('lessons_sum_time');
        }

        if (isset($data['lessons'])) {
             ($data['lessons'] == config('constants.options.ascending')) ? $query->withCount(['lessons'])->orderBy('lessons_count')->get() : $query->withCount(['lessons'])->orderByDesc('lessons_count')->get();
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tags']);
            });
        }

        if (isset($data['feedback'])) {
            $query = $query->withSum('feebacks', 'rate');
            ($data['feedback'] == config('constants.options.ascending')) ? $query->orderBy('feebacks_sum_rate') : $query->orderByDesc('feebacks_sum_rate');
        }

        return $query;
    }

    public function scopeShowOtherCourses($query, $courseId)
    {
            $query->where('id', '<>', $courseId)->limit(5);
    }

    public function scopeMainCourse($query)
    {
        $query->withCount(['users' => function ($subquery) {
            $subquery->where('role', config('constants.role.student'));
        }
        ])->orderByDesc('users_count')->limit(3);
    }

        
    public function scopeOtherCourse($query)
    {
        $query->orderByDesc('id')->limit(3);
    }
}
