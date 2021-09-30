<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'user_id'
    ];

    public function scopeJoined($query, $id)
    {
        if (Auth::check()) {
            $query->where('user_id', '=', Auth::user()->id)
                ->where('course_id', '=', $id);
        }
    }
}
