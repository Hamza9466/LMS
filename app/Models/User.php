<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    // 🔹 Relationship for Admin
  public function adminDetail()
{
    return $this->hasOne(AdminDetail::class, 'user_id');
}

public function getFullNameAttribute()
{
    if ($this->role === 'teacher' && $this->teacherDetail) {
        return $this->teacherDetail->first_name . ' ' . $this->teacherDetail->last_name;
    }

    if ($this->role === 'admin' && $this->adminDetail) {
        return $this->adminDetail->first_name . ' ' . $this->adminDetail->last_name;
    }

    if ($this->role === 'student' && $this->studentDetail) {
        return $this->studentDetail->first_name . ' ' . $this->studentDetail->last_name;
    }

    return 'N/A';
}
    // 🔹 Relationship for Teacher
    public function teacherDetail()
    {
        return $this->hasOne(\App\Models\TeacherDetail::class, 'user_id');
    }

    // 🔹 Relationship for Student
    public function studentDetail()
    {
        return $this->hasOne(\App\Models\StudentDetail::class, 'user_id');
    }

    public function enrolledCourses()
{
    return $this->belongsToMany(Course::class)
        ->withPivot(['purchased_at'])
        ->withTimestamps();
}


public function completedLessons() {
    return $this->belongsToMany(Lesson::class, 'lesson_user')->withPivot('completed_at')->withTimestamps();
}
public function taughtReviews()
    {
        return $this->hasManyThrough(
            CourseReview::class, // final
            Course::class,       // through
            'teacher_id',        // courses.teacher_id = users.id
            'course_id',         // course_reviews.course_id = courses.id
            'id',                // users.id
            'id'                 // courses.id
        );
    }
public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id');
}
 public function taughtStudentsCount(): int
    {
        return DB::table('course_user')
            ->join('courses', 'course_user.course_id', '=', 'courses.id')
            ->where('courses.teacher_id', $this->id)
            ->distinct('course_user.user_id')
            ->count('course_user.user_id');
    }
      public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
    public function personalDiscounts()
{
    return $this->hasMany(PersonalDiscount::class);
}
}