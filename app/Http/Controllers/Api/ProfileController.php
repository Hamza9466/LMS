<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\StudentDetail;

class ProfileController extends Controller
{
    /**
     * 📍 GET /api/profile
     * Show the logged-in user profile
     */
    public function show(Request $request)
    {
        $user = $request->user()->load('studentDetail');

        return response()->json([
            'status' => true,
            'message' => 'Profile fetched successfully.',
            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
                'student_detail' => $user->studentDetail,
            ]
        ], 200);
    }

    /**
     * 📍 PUT /api/profile
     * Update logged-in user profile
     */
  
}