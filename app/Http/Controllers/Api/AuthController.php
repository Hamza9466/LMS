<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

   

    public function register(Request $request)
    {
        try {
            // ✅ Validate all fields
            $validator = Validator::make($request->all(), [
                'first_name'       => 'required|string|max:50',
                'last_name'        => 'required|string|max:50',
                'username'         => 'required|string|max:50|unique:student_details',
                'email'            => 'required|email|unique:users',
                'password'         => 'required|min:6|confirmed',
                'phone'            => 'nullable|string|max:20',
                'gender'           => 'nullable|string|in:male,female,other',
                'dob'              => 'nullable|date',
                'address'          => 'nullable|string|max:255',
                'city'             => 'nullable|string|max:100',
                'country'          => 'nullable|string|max:100',
                'institute_name'   => 'nullable|string|max:255',
                'program_name'     => 'nullable|string|max:255',
                'enrollment_year'  => 'nullable|integer',
                'profile_image'    => 'nullable|image|max:2048',
                'terms'            => 'accepted'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // ✅ Create user record
            $user = User::create([
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'student',
            ]);

            // ✅ Handle profile image upload
            $imagePath = null;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $destination = public_path('uploads/students');
                if (!file_exists($destination)) {
                    mkdir($destination, 0777, true);
                }
                $file->move($destination, $filename);
                $imagePath = 'uploads/students/' . $filename;
            }

            // ✅ Create student details in DB
            $student = StudentDetail::create([
                'user_id'         => $user->id,
                'first_name'      => $request->first_name,
                'last_name'       => $request->last_name,
                'username'        => $request->username,
                'phone'           => $request->phone,
                'gender'          => $request->gender,
                'dob'             => $request->dob,
                'address'         => $request->address,
                'city'            => $request->city,
                'country'         => $request->country,
                'institute_name'  => $request->institute_name,
                'program_name'    => $request->program_name,
                'enrollment_year' => $request->enrollment_year,
                'profile_image'   => $imagePath,
            ]);

            // ✅ Generate Sanctum token
            $token = $user->createToken('auth_token')->plainTextToken;

            // ✅ Return successful JSON response
            return response()->json([
                'status' => true,
                'message' => 'Registration successful!',
                'data' => [
                    'user' => $user,
                    'student' => $student,
                    'token' => $token
                ]
            ], 201);

        } catch (\Exception $e) {
            // 🧨 Error handler
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
  public function login(Request $request)
{
    try {
        // ✅ Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // ✅ Find user
        $user = User::where('email', $request->email)->first();

        // ✅ Check user + password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password.'
            ], 401);
        }

        // ✅ Create Sanctum token
        $token = $user->createToken('auth_token')->plainTextToken;

        // ✅ Merge role-based details (like student info)
        $student = $user->studentDetail;
        $profile = [
            'id'              => $user->id,
            'email'           => $user->email,
            'role'            => $user->role,
            'first_name'      => $student->first_name ?? null,
            'last_name'       => $student->last_name ?? null,
            'username'        => $student->username ?? null,
            'phone'           => $student->phone ?? null,
            'gender'          => $student->gender ?? null,
            'dob'             => $student->dob ?? null,
            'address'         => $student->address ?? null,
            'city'            => $student->city ?? null,
            'country'         => $student->country ?? null,
            'institute_name'  => $student->institute_name ?? null,
            'program_name'    => $student->program_name ?? null,
            'enrollment_year' => $student->enrollment_year ?? null,
            'profile_image'   => $student->profile_image ?? null,
        ];

        // ✅ Return cleaned response
        return response()->json([
            'status' => true,
            'message' => 'Login successful!',
            'data' => [
                'user' => $profile,
                'token' => $token
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


}