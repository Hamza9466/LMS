<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\PersonalDiscount;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalDiscountController extends Controller
{
    public function index(Course $course)
    {
        $students = User::where('role', 'student')->with('studentDetail')->latest()->take(300)->get();
        $discounts = PersonalDiscount::with('user.studentDetail')
            ->where('course_id', $course->id)
            ->latest()->get();

        return view('admin.pages.courses.discounts', compact('course', 'students', 'discounts'));
    }

   public function store(Request $request, Course $course)
{
    $data = $request->validate([
        'user_id'   => ['required','exists:users,id'],
        'type'      => ['required','in:percent,amount'],
        'value'     => ['required','numeric','min:0.01'],
        'starts_at' => ['nullable','date'],
        'ends_at'   => ['nullable','date','after_or_equal:starts_at'],
        'max_uses'  => ['nullable','integer','min:1'],
        'active'    => ['nullable','boolean'],
    ]);

    // normalize checkbox
    $data['active'] = $request->boolean('active');

    // create/update the record (now that model allows mass assignment)
    PersonalDiscount::updateOrCreate(
        ['course_id' => $course->id, 'user_id' => $data['user_id']],
        [
            'type'      => $data['type'],
            'value'     => $data['value'],            // <— REQUIRED COLUMN IN YOUR TABLE
            'starts_at' => $data['starts_at'] ?? null,
            'ends_at'   => $data['ends_at']   ?? null,
            'max_uses'  => $data['max_uses'] ?? null,
            'active'    => $data['active'],
        ]
    );

    return back()->with('success', 'Special discount saved.');
}


    public function destroy(PersonalDiscount $discount)
    {
        $discount->delete();
        return back()->with('success', 'Discount removed.');
    }
}