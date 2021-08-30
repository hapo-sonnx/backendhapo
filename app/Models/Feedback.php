<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_id',
        'lesson_id',
        'content',
        'rate'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'feedback_id', 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'feedback_id', 'user_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'feedback_id', 'lesson_id');
    }
}
