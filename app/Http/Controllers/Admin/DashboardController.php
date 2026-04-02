<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\Order;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = $user->role;
        $currencySymbol = '$';

        // Total courses in the system
        $totalCourses = Course::count();

        // Total students
        $totalStudents = User::where('role', 'student')->count();

        // Total enrolled courses across all students
        $enrolledCoursesCount = DB::table('course_user')
            ->whereNotNull('purchased_at')
            ->count();

        // Completed courses: all lessons completed by students
        $completedCoursesCount = DB::table('sections as s')
            ->join('lessons as l', 's.id', '=', 'l.section_id')
            ->leftJoin('lesson_user as lu', 'lu.lesson_id', '=', 'l.id')
            ->whereNotNull('lu.user_id') // any student who completed lesson
            ->select('s.course_id', DB::raw('COUNT(l.id) as total_lessons'), DB::raw('COUNT(lu.lesson_id) as completed_lessons'))
            ->groupBy('s.course_id')
            ->havingRaw('COUNT(l.id) = COUNT(lu.lesson_id)')
            ->get()
            ->count();

        $activeCoursesCount = max($enrolledCoursesCount - $completedCoursesCount, 0);

        // Earnings from paid orders
        $earnings = Order::where('status', 'paid')->sum('total');

        $assignedCoursesCount = 0;
        $createdAssignmentsCount = 0;
        $studentSubmissionsCount = 0;

        if (in_array($role, ['admin', 'teacher'], true)) {
            if ($role === 'admin') {
                $assignedCoursesCount = Course::whereHas('assignments')->count();
                $createdAssignmentsCount = Assignment::count();
                $studentSubmissionsCount = AssignmentSubmission::whereNotNull('submitted_at')->count();
            } else {
                $assignedCoursesCount = Course::where('teacher_id', $user->id)->count();
                $createdAssignmentsCount = Assignment::where('teacher_id', $user->id)->count();
                $studentSubmissionsCount = AssignmentSubmission::query()
                    ->whereHas('assignment', fn ($q) => $q->where('teacher_id', $user->id))
                    ->whereNotNull('submitted_at')
                    ->count();
            }
        }

        return view('admin.dashboard', compact(
            'enrolledCoursesCount',
            'completedCoursesCount',
            'activeCoursesCount',
            'totalCourses',
            'totalStudents',
            'earnings',
            'role',
            'currencySymbol',
            'assignedCoursesCount',
            'createdAssignmentsCount',
            'studentSubmissionsCount'
        ));
    }
}