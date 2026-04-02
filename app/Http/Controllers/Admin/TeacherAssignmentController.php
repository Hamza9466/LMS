<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $role = auth()->user()?->role;
            if (!in_array($role, ['teacher', 'admin'], true)) {
                abort(403);
            }
            return $next($request);
        });
    }

    protected function teacherCourseIds(): array
    {
        if (auth()->user()->role === 'admin') {
            return Course::pluck('id')->all();
        }
        return Course::where('teacher_id', auth()->id())->pluck('id')->all();
    }

    protected function assertCourseAllowed(int $courseId): void
    {
        if (!in_array($courseId, $this->teacherCourseIds(), true)) {
            abort(403);
        }
    }

    protected function assertAssignmentAllowed(Assignment $assignment): void
    {
        $this->assertCourseAllowed((int) $assignment->course_id);
        if (auth()->user()->role === 'teacher' && (int) $assignment->teacher_id !== (int) auth()->id()) {
            abort(403);
        }
    }

    public function index()
    {
        $courseIds = $this->teacherCourseIds();
        $assignments = Assignment::query()
            ->with('course')
            ->whereIn('course_id', $courseIds ?: [0])
            ->when(auth()->user()->role === 'teacher', fn ($q) => $q->where('teacher_id', auth()->id()))
            ->latest()
            ->paginate(15);

        return view('admin.pages.assignments.teacher_index', compact('assignments'));
    }

    public function create()
    {
        $courses = Course::query()
            ->when(auth()->user()->role === 'teacher', fn ($q) => $q->where('teacher_id', auth()->id()))
            ->orderBy('title')
            ->get();

        return view('admin.pages.assignments.teacher_create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:10000'],
            'deadline_at' => ['required', 'date'],
        ]);

        $this->assertCourseAllowed((int) $data['course_id']);

        $course = Course::findOrFail($data['course_id']);
        $teacherId = auth()->user()->role === 'admin'
            ? (int) $course->teacher_id
            : auth()->id();

        if (!$teacherId) {
            return back()->withErrors(['course_id' => 'This course has no teacher assigned.'])->withInput();
        }

        if (auth()->user()->role === 'teacher' && (int) $course->teacher_id !== (int) auth()->id()) {
            abort(403);
        }

        Assignment::create([
            'course_id' => $data['course_id'],
            'teacher_id' => $teacherId,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'deadline_at' => $data['deadline_at'],
        ]);

        return redirect()->route('teacher.assignments.index')->with('success', 'Assignment created.');
    }

    public function show(Assignment $assignment)
    {
        $this->assertAssignmentAllowed($assignment);

        $assignment->load(['course', 'submissions.student.studentDetail']);

        $enrolledQuery = DB::table('course_user')->where('course_id', $assignment->course_id);
        if (DB::getSchemaBuilder()->hasColumn('course_user', 'purchased_at')) {
            $enrolledQuery->whereNotNull('purchased_at');
        }
        $enrolledIds = $enrolledQuery->pluck('user_id');

        $enrolledStudents = User::query()
            ->whereIn('id', $enrolledIds)
            ->where('role', 'student')
            ->with('studentDetail')
            ->orderBy('id')
            ->get();

        $submissionsByUserId = $assignment->submissions->keyBy('user_id');

        return view('admin.pages.assignments.teacher_show', compact('assignment', 'enrolledStudents', 'submissionsByUserId'));
    }

    public function gradeSubmission(Request $request, AssignmentSubmission $submission)
    {
        $assignment = $submission->assignment;
        $this->assertAssignmentAllowed($assignment);

        $data = $request->validate([
            'marks' => ['nullable', 'numeric', 'min:0', 'max:999999'],
            'feedback' => ['nullable', 'string', 'max:10000'],
        ]);

        if (!$submission->submitted_at) {
            return back()->with('error', 'Student has not submitted yet.');
        }

        $submission->update([
            'marks' => $data['marks'] ?? null,
            'feedback' => $data['feedback'] ?? null,
            'graded_at' => now(),
        ]);

        return back()->with('success', 'Submission graded.');
    }

    /**
     * Enrolled students per course + lesson completion counts for teacher’s courses.
     */
    public function monitor()
    {
        $courseIds = $this->teacherCourseIds();
        if (empty($courseIds)) {
            return view('admin.pages.assignments.teacher_monitor', ['rows' => collect()]);
        }

        $courses = Course::query()
            ->whereIn('id', $courseIds)
            ->when(auth()->user()->role === 'teacher', fn ($q) => $q->where('teacher_id', auth()->id()))
            ->orderBy('title')
            ->get();

        $rows = [];
        foreach ($courses as $course) {
            $lessonCount = DB::table('lessons')
                ->join('sections', 'sections.id', '=', 'lessons.section_id')
                ->where('sections.course_id', $course->id)
                ->count('lessons.id');

            $enrolled = DB::table('course_user')
                ->where('course_id', $course->id)
                ->when(
                    DB::getSchemaBuilder()->hasColumn('course_user', 'purchased_at'),
                    fn ($q) => $q->whereNotNull('purchased_at')
                )
                ->pluck('user_id');

            foreach ($enrolled as $userId) {
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

                $student = \App\Models\User::with('studentDetail')->find($userId);
                $name = $student?->studentDetail
                    ? trim($student->studentDetail->first_name.' '.$student->studentDetail->last_name)
                    : ($student?->email ?? 'User #'.$userId);

                $rows[] = (object) [
                    'course_title' => $course->title,
                    'student_name' => $name,
                    'student_email' => $student?->email,
                    'lessons_total' => $lessonCount,
                    'lessons_completed' => $completed,
                    'quizzes_passed' => $quizPassed,
                ];
            }
        }

        return view('admin.pages.assignments.teacher_monitor', [
            'rows' => collect($rows),
        ]);
    }
}
