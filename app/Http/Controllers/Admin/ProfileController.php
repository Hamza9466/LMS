<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function profile(){
        return view('admin.pages.profile');
    }

  public function show(Request $request)
    {
        $user = $request->user();

        // Resolve role
        if (method_exists($user, 'hasRole')) {
            $role = $user->hasRole('student') ? 'student'
                  : ($user->hasRole('teacher') ? 'teacher' : 'admin');
        } else {
            $role = $user->role ?? 'admin';
        }

        // Eager-load role-specific relations if available
        if ($role === 'student' && method_exists($user, 'studentDetail')) {
            $user->loadMissing('studentDetail');
        }
        if ($role === 'teacher' && method_exists($user, 'teacherDetail')) {
            $user->loadMissing('teacherDetail');
        }
        if ($role === 'admin' && method_exists($user, 'adminDetail')) {
            $user->loadMissing('adminDetail');
        }

        // Pass role name explicitly so Blade doesn't recompute
        $roleFromController = $role;

        return view('admin.pages.profile', compact('user', 'roleFromController'));
    }

    public function edit(Request $request)
    {
        $user = $request->user();
        $user->loadMissing('adminDetail');

        return view('admin.pages.profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $user->update([
            'email' => $validated['email'],
        ]);

        $user->loadMissing('adminDetail');
        $profileImagePath = $user->adminDetail?->profile_image;

        if ($request->hasFile('profile_image')) {
            if ($profileImagePath && Storage::disk('public')->exists($profileImagePath)) {
                Storage::disk('public')->delete($profileImagePath);
            }
            $profileImagePath = $request->file('profile_image')->store('uploads/admins', 'public');
        }

        AdminDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'department' => $validated['department'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'profile_image' => $profileImagePath,
            ]
        );

        return redirect()
            ->route('admin.profile')
            ->with('success', 'Profile updated successfully.');
    }
}