<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * 📍 GET /api/announcements
     * Returns all announcements assigned to the logged-in user
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        // ✅ Fetch announcements linked to this user
        $announcements = Announcement::query()
            ->select(
                'announcements.id',
                'announcements.title',
                'announcements.body',
                'announcements.course_id',
                'announcements.is_published',
                'announcements.created_at'
            )
            ->join('announcement_users', 'announcement_users.announcement_id', '=', 'announcements.id')
            ->where('announcement_users.user_id', $user->id)
            ->where('announcements.is_published', true)
            ->with('course:id,title')
            ->orderByDesc('announcements.created_at')
            ->get();

        // ✅ Format output for API
        $data = $announcements->map(function ($a) {
            return [
                'id'           => $a->id,
                'title'        => $a->title,
                'body'         => $a->body,
                'course'       => $a->course?->title ?? null,
                'is_published' => (bool) $a->is_published,
                'date'         => $a->created_at->format('F d, Y h:i A'),
            ];
        });

        return response()->json([
            'status'  => true,
            'message' => 'Announcements fetched successfully.',
            'data'    => $data
        ], 200);
    }
}