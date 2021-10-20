<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'feebacks';

    protected $fillable = [
        'user_id',
        'course_id',
        'lesson_id',
        'content',
        'rate'
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'feedback_id', 'lesson_id');
    }
    
    public function scopeReviewUser($query)
    {
        $query->leftJoin('users', 'users.id', 'feebacks.user_id')
            ->leftJoin('courses', 'courses.id', 'feebacks.course_id')
            ->select('users.name AS user_name', 'courses.title AS course_name', 'users.phone', 'feebacks.rate', 'feebacks.content');
    }

    
    public function scopeFeedbacksOfCourse($query, $courseId)
    {
        $query->leftJoin('users', 'feebacks.user_id', 'users.id')
            ->select('feebacks.*', 'users.phone', 'users.name')
            ->where('course_id', '=', $courseId);
    }
}
