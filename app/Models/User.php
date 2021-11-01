<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const GENDER = [
        'male' => 1,
        'female' => 0,
    ];

    const ROLE = [
        'teacher' => 1,
        'student' => 0,
    ];

    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_courses', 'user_id', 'course_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'users_lessons', 'user_id', 'lesson_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }

    public function ducuments()
    {
        return $this->belongsToMany(Document::class, 'document_users', 'user_id', 'document_id');
    }

    public function getDateOfBirthdayAttribute()
    {
        return Carbon::parse($this['birthday'])->format('d/m/Y');
    }

     public function updateInfo($data, $user) {
        return $user->update([
            'name' => $data['update_name'],
            'email' => $data['update_email'],
            'phone' => $data['update_phone'],
            'about' => $data['update_about'],
            'birthday' => $data['update_birthday'],
            'address' => $data['update_address']
        ]);
     }
}
