<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Course, CourseReview};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseReviewController extends Controller
{
    /**
     * 📍 GET /api/courses/{course}/reviews
     * Show all approved reviews for a course
     */
    public function index($courseId)
    {
        $course = Course::find($courseId);
        if (!$course) {
            return response()->json(['status' => false, 'message' => 'Course not found.'], 404);
        }

        $reviews = CourseReview::with(['user:id,email'])
            ->where('course_id', $course->id)
            ->where('is_approved', true)
            ->latest()
            ->get(['id', 'user_id', 'rating', 'title', 'comment', 'created_at']);

        return response()->json([
            'status' => true,
            'message' => 'Course reviews fetched successfully.',
            'data' => $reviews
        ], 200);
    }

    /**
     * 📍 POST /api/courses/{course}/reviews
     * Submit a new review (user must be enrolled)
     */
    public function store(Request $request, Course $course)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Unauthenticated.'], 401);
        }

        // ✅ Validate
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
        ]);

        // ✅ Check enrollment
        $enrolled = $user->enrolledCourses()
            ->wherePivotNotNull('purchased_at')
            ->where('courses.id', $course->id)
            ->exists();

        if (!$enrolled) {
            return response()->json([
                'status' => false,
                'message' => 'You must be enrolled in this course to leave a review.'
            ], 403);
        }

        // ✅ Prevent duplicate reviews
        $exists = CourseReview::where('course_id', $course->id)
            ->where('user_id', $user->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'status' => false,
                'message' => 'You have already submitted a review for this course.'
            ], 409);
        }

        // ✅ Create new review (pending approval)
        $review = CourseReview::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'rating' => $data['rating'],
            'title' => $data['title'] ?? null,
            'comment' => $data['comment'] ?? null,
            'is_approved' => false,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thanks! Your review is submitted and awaiting admin approval.',
            'data' => $review
        ], 201);
    }

    /**
     * 📍 GET /api/my-reviews
     * Show reviews created by the authenticated user
     */
    public function my(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Unauthenticated.'], 401);
        }

        $reviews = CourseReview::with(['course:id,title,thumbnail'])
            ->where('user_id', $user->id)
            ->latest()
            ->get(['id', 'course_id', 'rating', 'title', 'comment', 'is_approved', 'created_at']);

        return response()->json([
            'status' => true,
            'message' => 'Your reviews fetched successfully.',
            'data' => $reviews
        ], 200);
    }

    /**
     * 📍 PUT /api/reviews/{id}
     * Admin approves or rejects a review
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();
        if (!$user || $user->role !== 'admin') {
            return response()->json(['status' => false, 'message' => 'Unauthorized.'], 403);
        }

        $review = CourseReview::find($id);
        if (!$review) {
            return response()->json(['status' => false, 'message' => 'Review not found.'], 404);
        }

        $data = $request->validate([
            'is_approved' => 'required|in:0,1',
        ]);

        $review->is_approved = (bool)$data['is_approved'];
        $review->save();

        // ✅ Optionally update course rating stats
        $review->course?->recalculateRatings();

        return response()->json([
            'status' => true,
            'message' => 'Review status updated successfully.',
            'data' => $review
        ], 200);
    }

    /**
     * 📍 DELETE /api/reviews/{id}
     * Admin deletes a review
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        if (!$user || $user->role !== 'admin') {
            return response()->json(['status' => false, 'message' => 'Unauthorized.'], 403);
        }

        $review = CourseReview::find($id);
        if (!$review) {
            return response()->json(['status' => false, 'message' => 'Review not found.'], 404);
        }

        $course = $review->course;
        $review->delete();
        $course?->recalculateRatings();

        return response()->json([
            'status' => true,
            'message' => 'Review deleted successfully.'
        ], 200);
    }
}