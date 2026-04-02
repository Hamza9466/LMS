<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->user()?->role !== 'student') {
                abort(403);
            }
            return $next($request);
        });
    }

    protected function enrolledCourseIds(): array
    {
        $q = DB::table('course_user')->where('user_id', auth()->id());
        if (DB::getSchemaBuilder()->hasColumn('course_user', 'purchased_at')) {
            $q->whereNotNull('purchased_at');
        }
        return $q->pluck('course_id')->all();
    }

    public function index()
    {
        $courseIds = $this->enrolledCourseIds();
        $assignments = Assignment::query()
            ->with('course')
            ->whereIn('course_id', $courseIds ?: [0])
            ->orderByDesc('deadline_at')
            ->get();

        $submissions = AssignmentSubmission::query()
            ->where('user_id', auth()->id())
            ->whereIn('assignment_id', $assignments->pluck('id'))
            ->get()
            ->keyBy('assignment_id');

        return view('admin.pages.assignments.student_index', compact('assignments', 'submissions'));
    }

    public function show(Assignment $assignment)
    {
        $courseIds = $this->enrolledCourseIds();
        if (!in_array((int) $assignment->course_id, array_map('intval', $courseIds), true)) {
            abort(403);
        }

        $submission = AssignmentSubmission::firstOrNew([
            'assignment_id' => $assignment->id,
            'user_id' => auth()->id(),
        ]);

        return view('admin.pages.assignments.student_show', compact('assignment', 'submission'));
    }

    public function submit(Request $request, Assignment $assignment)
    {
        $courseIds = $this->enrolledCourseIds();
        if (!in_array((int) $assignment->course_id, array_map('intval', $courseIds), true)) {
            abort(403);
        }

        $data = $request->validate([
            'submission_text' => ['nullable', 'string', 'max:20000'],
            'attachment' => ['nullable', 'file', 'max:10240'],
        ]);

        if (empty($data['submission_text']) && !$request->hasFile('attachment')) {
            return back()->withErrors(['submission_text' => 'Please add text or upload a file.'])->withInput();
        }

        $submission = AssignmentSubmission::firstOrNew([
            'assignment_id' => $assignment->id,
            'user_id' => auth()->id(),
        ]);

        $path = $submission->attachment_path;
        if ($request->hasFile('attachment')) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('attachment')->store('uploads/assignment-submissions', 'public');
        }

        $text = $request->filled('submission_text')
            ? (string) $data['submission_text']
            : $submission->submission_text;

        $submission->fill([
            'submission_text' => $text,
            'attachment_path' => $path,
            'submitted_at' => now(),
        ]);
        $submission->save();

        return redirect()->route('student.assignments.index')->with('success', 'Assignment submitted.');
    }
}
