<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AllUsersController extends Controller
{
    /**
     * 📍 GET /api/users
     * Show all users with student details
     */
    public function index()
    {
        try {
            $users = User::with('studentDetail')->get();

            $formatted = $users->map(function ($user) {
                return [
                    'id'              => $user->id,
                    'email'           => $user->email,
                    'role'            => $user->role,
                    'first_name'      => $user->studentDetail->first_name ?? null,
                    'last_name'       => $user->studentDetail->last_name ?? null,
                    'username'        => $user->studentDetail->username ?? null,
                    'phone'           => $user->studentDetail->phone ?? null,
                    'gender'          => $user->studentDetail->gender ?? null,
                    'dob'             => $user->studentDetail->dob ?? null,
                    'address'         => $user->studentDetail->address ?? null,
                    'city'            => $user->studentDetail->city ?? null,
                    'country'         => $user->studentDetail->country ?? null,
                    'institute_name'  => $user->studentDetail->institute_name ?? null,
                    'program_name'    => $user->studentDetail->program_name ?? null,
                    'enrollment_year' => $user->studentDetail->enrollment_year ?? null,
                    'profile_image'   => $user->studentDetail->profile_image ?? null,
                    'created_at'      => $user->created_at->toDateTimeString(),
                ];
            });

            return response()->json([
                'status' => true,
                'message' => 'All users fetched successfully.',
                'data' => $formatted
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 📍 GET /api/users/{id}
     * View a single user by ID
     */
    public function show($id)
    {
        try {
            $user = User::with('studentDetail')->find($id);

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found.'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'User fetched successfully.',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 📍 PUT /api/users/{id}
     * Update user details
     */
  public function update(Request $request, $id)
{
    try {
        $user = User::with('studentDetail')->find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.'
            ], 404);
        }

        // ✅ Validate input
        $validated = $request->validate([
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'first_name' => 'nullable|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'username' => 'nullable|string|max:50|unique:student_details,username,' . optional($user->studentDetail)->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:male,female,other',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'institute_name' => 'nullable|string|max:255',
            'program_name' => 'nullable|string|max:255',
            'enrollment_year' => 'nullable|integer',
        ]);

        // ✅ Update user info
        if (isset($validated['email'])) {
            $user->email = $validated['email'];
        }

        if (isset($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        // ✅ Update or create student details
        $student = StudentDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name'      => $validated['first_name'] ?? $user->studentDetail->first_name ?? null,
                'last_name'       => $validated['last_name'] ?? $user->studentDetail->last_name ?? null,
                'username'        => $validated['username'] ?? $user->studentDetail->username ?? null,
                'phone'           => $validated['phone'] ?? $user->studentDetail->phone ?? null,
                'gender'          => $validated['gender'] ?? $user->studentDetail->gender ?? null,
                'dob'             => $validated['dob'] ?? $user->studentDetail->dob ?? null,
                'address'         => $validated['address'] ?? $user->studentDetail->address ?? null,
                'city'            => $validated['city'] ?? $user->studentDetail->city ?? null,
                'country'         => $validated['country'] ?? $user->studentDetail->country ?? null,
                'institute_name'  => $validated['institute_name'] ?? $user->studentDetail->institute_name ?? null,
                'program_name'    => $validated['program_name'] ?? $user->studentDetail->program_name ?? null,
                'enrollment_year' => $validated['enrollment_year'] ?? $user->studentDetail->enrollment_year ?? null,
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'User updated successfully.',
            'data' => [
                'user' => $user->fresh('studentDetail')
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong!',
            'error' => $e->getMessage()
        ], 500);
    }
}



    /**
     * 📍 DELETE /api/users/{id}
     * Delete user and related student record
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found.'
                ], 404);
            }

            // ✅ Delete student record if exists
            StudentDetail::where('user_id', $user->id)->delete();

            // ✅ Delete user
            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'User deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}