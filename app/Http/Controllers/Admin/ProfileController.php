<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}