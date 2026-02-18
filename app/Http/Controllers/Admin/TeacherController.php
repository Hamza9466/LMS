<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AdminDetail;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Models\TeacherDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

     public function index(Request $request)
    {
        $role = $request->get('role');

        $query = User::query();

        if ($role && $role !== 'all') {
            $query->where('role', $role);
        }

        $users = $query
            ->with(['adminDetail', 'teacherDetail', 'studentDetail'])
            ->latest()
            ->paginate(10);

        return view('admin.pages.all-users.all_users', compact('users', 'role'));
    }

    public function create(Request $request)
    {
        $role = $request->query('role'); // admin, teacher, student
        return view('admin.pages.all-users.add_user', [
            'edit' => false,
            'role' => $role,
            'user' => null
        ]);
    }

   public function store(Request $request)
{
    $request->validate([
        'role' => 'required|in:admin,teacher,student',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
    ]);

    $user = User::create([
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    $profileImagePath = null;
    if ($request->hasFile('profile_image')) {
        $profileImagePath = $request->file('profile_image')
            ->store('uploads/' . $request->role . 's', 'public');
    }

    if ($request->role === 'admin') {
        AdminDetail::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'department' => $request->department,
            'profile_image' => $profileImagePath,
        ]);
    }

    if ($request->role === 'student') {
        StudentDetail::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'profile_image' => $profileImagePath,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'institute_name' => $request->institute_name,
            'program_name' => $request->program_name,
            'enrollment_year' => $request->enrollment_year,
        ]);
    }

    if ($request->role === 'teacher') {
        TeacherDetail::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'profile_image' => $profileImagePath,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'specialization' => $request->specialization,
            'bio' => $request->bio,
        ]);
    }

    return redirect()->route('admin.teachers.index')->with('success', 'User created successfully.');
}


    public function show($id)
{
    $user = User::with(['adminDetail', 'teacherDetail', 'studentDetail'])->findOrFail($id);

    $detail = null;

    if ($user->role == 'admin') {
        $detail = $user->adminDetail;
    } elseif ($user->role == 'teacher') {
        $detail = $user->teacherDetail;
    } elseif ($user->role == 'student') {
        $detail = $user->studentDetail;
    }

    return view('admin.pages.all-users.view_user', compact('user', 'detail'));
}
   public function edit($id)
{
    $user = User::with([
        'adminDetail',
        'teacherDetail',
        'studentDetail'
    ])->findOrFail($id);

    return view('admin.pages.all-users.edit_user', [
        'edit' => true,
        'user' => $user
    ]);
}


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        $profileImagePath = $user->profile_image ?? null;
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')
                ->store('uploads/' . $user->role . 's', 'public');
        }

        if ($user->role === 'admin') {
            $user->adminDetail()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'department' => $request->department,
                    'phone' => $request->phone,
                    'profile_image' => $profileImagePath
                ]
            );
        }

        if ($user->role === 'student') {
            $user->studentDetail()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'username' => $request->username,
                    'profile_image' => $profileImagePath,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'institute_name' => $request->institute_name,
                    'program_name' => $request->program_name,
                    'enrollment_year' => $request->enrollment_year,
                ]
            );
        }

        return redirect()->route('admin.teachers.index')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'User deleted successfully.');
    }
}