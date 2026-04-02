<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AssignmentAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function manage()
    {
        $assignments = Assignment::query()
            ->with(['course', 'teacher.teacherDetail'])
            ->withCount([
                'submissions',
                'submissions as graded_submissions_count' => function ($q) {
                    $q->whereNotNull('graded_at');
                },
            ])
            ->latest()
            ->paginate(25);

        return view('admin.pages.assignments.admin_manage', compact('assignments'));
    }

    public function teacherActivity()
    {
        $teachers = User::query()
            ->where('role', 'teacher')
            ->with('teacherDetail')
            ->orderBy('id')
            ->get();

        $rows = [];
        foreach ($teachers as $t) {
            $coursesCount = Course::where('teacher_id', $t->id)->count();
            $assignmentsCount = Assignment::where('teacher_id', $t->id)->count();
            $submissionsTotal = AssignmentSubmission::query()
                ->whereHas('assignment', fn ($q) => $q->where('teacher_id', $t->id))
                ->whereNotNull('submitted_at')
                ->count();
            $pendingGrade = AssignmentSubmission::query()
                ->whereHas('assignment', fn ($q) => $q->where('teacher_id', $t->id))
                ->whereNotNull('submitted_at')
                ->whereNull('graded_at')
                ->count();
            $recentAssignments = Assignment::where('teacher_id', $t->id)
                ->where('created_at', '>=', now()->subDays(30))
                ->count();

            $name = $t->teacherDetail
                ? trim($t->teacherDetail->first_name.' '.$t->teacherDetail->last_name)
                : (explode('@', $t->email)[0] ?? 'Teacher #'.$t->id);

            $rows[] = (object) [
                'teacher_id' => $t->id,
                'teacher_name' => $name,
                'email' => $t->email,
                'courses_count' => $coursesCount,
                'assignments_count' => $assignmentsCount,
                'assignments_last_30_days' => $recentAssignments,
                'submissions_total' => $submissionsTotal,
                'submissions_pending_grade' => $pendingGrade,
            ];
        }

        return view('admin.pages.assignments.admin_teacher_activity', ['rows' => collect($rows)]);
    }

    public function performance()
    {
        $courses = Course::query()->orderBy('title')->get();
        $rows = [];

        foreach ($courses as $course) {
            $lessonCount = DB::table('lessons')
                ->join('sections', 'sections.id', '=', 'lessons.section_id')
                ->where('sections.course_id', $course->id)
                ->count('lessons.id');

            $enrolledQuery = DB::table('course_user')->where('course_id', $course->id);
            if (DB::getSchemaBuilder()->hasColumn('course_user', 'purchased_at')) {
                $enrolledQuery->whereNotNull('purchased_at');
            }
            $enrolledIds = $enrolledQuery->pluck('user_id');

            foreach ($enrolledIds as $userId) {
                $completed = DB::table('lesson_user')
                    ->join('lessons', 'lessons.id', '=', 'lesson_user.lesson_id')
                    ->join('sections', 'sections.id', '=', 'lessons.section_id')
                    ->where('sections.course_id', $course->id)
                    ->where('lesson_user.user_id', $userId)
                    ->whereNotNull('lesson_user.completed_at')
                    ->count();

                $quizPassed = DB::table('quiz_attempts')
                    ->join('quizzes', 'quizzes.id', '=', 'quiz_attempts.quiz_id')
                    ->where('quizzes.course_id', $course->id)
                    ->where('quiz_attempts.user_id', $userId)
                    ->where('quiz_attempts.is_passed', true)
                    ->count();

                $student = User::with('studentDetail')->find($userId);
                if (!$student || $student->role !== 'student') {
                    continue;
                }

                $name = $student->studentDetail
                    ? trim($student->studentDetail->first_name.' '.$student->studentDetail->last_name)
                    : ($student->email ?? 'User #'.$userId);

                $marksBase = AssignmentSubmission::query()
                    ->whereHas('assignment', fn ($q) => $q->where('course_id', $course->id))
                    ->where('user_id', $userId)
                    ->whereNotNull('marks');

                $assignmentAvg = $marksBase->exists()
                    ? round((float) (clone $marksBase)->avg('marks'), 2)
                    : null;

                $rows[] = (object) [
                    'course_title' => $course->title,
                    'student_name' => $name,
                    'student_email' => $student->email,
                    'lessons_total' => $lessonCount,
                    'lessons_completed' => $completed,
                    'quizzes_passed' => $quizPassed,
                    'assignment_avg_marks' => $assignmentAvg,
                ];
            }
        }

        return view('admin.pages.assignments.admin_performance', [
            'rows' => collect($rows),
        ]);
    }
}
