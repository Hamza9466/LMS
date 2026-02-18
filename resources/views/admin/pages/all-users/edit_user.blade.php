@extends('admin.layouts.main')

@section('content')
@php
use Illuminate\Support\Facades\Storage;

/** Helper: turn a stored path (or URL) into a browser URL */
$resolveImg = function($raw, $role=null) {
    if (!$raw) return null;
    $raw = str_replace('\\','/',$raw);
    $raw = preg_replace('/^[A-Za-z]:\//', '', $raw);
    $raw = ltrim($raw, '/');

    // Full URL?
    if (preg_match('#^https?://#i', $raw)) return $raw;

    // If not already under uploads/, normalize to uploads/{role}s/...
    if (!str_starts_with($raw, 'uploads/')) {
        $folder = $role==='teacher' ? 'teachers' : ($role==='student' ? 'students' : 'admins');
        if (preg_match('#^(students|teachers|admins)/#',$raw)) {
            $raw = "uploads/{$raw}";
        } else {
            $raw = "uploads/{$folder}/{$raw}";
        }
    }

    // storage/app/public
    if (Storage::disk('public')->exists($raw)) return asset('storage/'.$raw);
    // direct public/uploads
    if (file_exists(public_path($raw))) return asset($raw);
    // public/storage/uploads
    if (file_exists(public_path('storage/'.$raw))) return asset('storage/'.$raw);

    return null;
};
@endphp

<div class="container py-4">
    <h2>{{ $edit ? 'Edit User' : 'Add User' }}</h2>

    {{-- Role Selection (Only for Create) --}}
    @if (!$edit)
    <form method="GET" action="{{ route('admin.teachers.create') }}" class="mb-4">
        <div class="input-group" style="max-width: 300px;">
            <select name="role" class="form-select" onchange="this.form.submit()">
                <option value="">Select Role</option>
                <option value="admin"   {{ request('role')=='admin'   ? 'selected' : '' }}>Admin</option>
                <option value="teacher" {{ request('role')=='teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="student" {{ request('role')=='student' ? 'selected' : '' }}>Student</option>
            </select>
        </div>
    </form>
    @endif

    {{-- Main Form --}}
    <form action="{{ $edit ? route('admin.teachers.update', $user->id) : route('admin.teachers.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if ($edit) @method('PUT') @endif

        <input type="hidden" name="role" value="{{ $edit ? $user->role : request('role') }}">

        <div class="row">
            {{-- Common Fields --}}
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email"
                       value="{{ old('email', $edit ? $user->email : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            @unless($edit)
            <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control border-1 bg-white" required>
            </div>
            @endunless

            {{-- ADMIN FIELDS --}}
            @if(request('role') === 'admin' || ($edit && $user->role === 'admin'))
            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" name="first_name"
                       value="{{ old('first_name', $edit ? ($user->adminDetail->first_name ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name"
                       value="{{ old('last_name', $edit ? ($user->adminDetail->last_name ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone"
                       value="{{ old('phone', $edit ? ($user->adminDetail->phone ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Profile Image</label>
                <input type="file" name="profile_image" class="form-control border-1 bg-white">
                @if($edit && $user->adminDetail && $user->adminDetail->profile_image)
                    @php $prev = $resolveImg($user->adminDetail->profile_image, 'admin'); @endphp
                    @if($prev)<img src="{{ $prev }}" width="100" class="mt-2 rounded border">@endif
                @endif
            </div>
            @endif

            {{-- TEACHER FIELDS --}}
            @if(request('role') === 'teacher' || ($edit && $user->role === 'teacher'))
            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" name="first_name"
                       value="{{ old('first_name', $edit ? ($user->teacherDetail->first_name ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name"
                       value="{{ old('last_name', $edit ? ($user->teacherDetail->last_name ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Username</label>
                <input type="text" name="username"
                       value="{{ old('username', $edit ? ($user->teacherDetail->username ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone"
                       value="{{ old('phone', $edit ? ($user->teacherDetail->phone ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Qualification</label>
                <input type="text" name="qualification"
                       value="{{ old('qualification', $edit ? ($user->teacherDetail->qualification ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Experience</label>
                <input type="text" name="experience"
                       value="{{ old('experience', $edit ? ($user->teacherDetail->experience ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Specialization</label>
                <input type="text" name="specialization"
                       value="{{ old('specialization', $edit ? ($user->teacherDetail->specialization ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-12 mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control border-1 bg-white" rows="4">{{ old('bio', $edit ? ($user->teacherDetail->bio ?? '') : '') }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Profile Image</label>
                <input type="file" name="profile_image" class="form-control border-1 bg-white">
                @if($edit && $user->teacherDetail && $user->teacherDetail->profile_image)
                    @php $prev = $resolveImg($user->teacherDetail->profile_image, 'teacher'); @endphp
                    @if($prev)<img src="{{ $prev }}" width="100" class="mt-2 rounded border">@endif
                @endif
            </div>
            @endif

            {{-- STUDENT FIELDS --}}
            @if(request('role') === 'student' || ($edit && $user->role === 'student'))
            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" name="first_name"
                       value="{{ old('first_name', $edit ? ($user->studentDetail->first_name ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name"
                       value="{{ old('last_name', $edit ? ($user->studentDetail->last_name ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Username</label>
                <input type="text" name="username"
                       value="{{ old('username', $edit ? ($user->studentDetail->username ?? '') : '') }}"
                       class="form-control border-1 bg-white" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone"
                       value="{{ old('phone', $edit ? ($user->studentDetail->phone ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Gender</label>
                <select name="gender" class="form-select border-1 bg-white">
                    @php $g = old('gender', $edit ? ($user->studentDetail->gender ?? '') : ''); @endphp
                    <option value="male"   {{ $g=='male'   ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $g=='female' ? 'selected' : '' }}>Female</option>
                    <option value="other"  {{ $g=='other'  ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dob"
                       value="{{ old('dob', $edit ? ($user->studentDetail->dob ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Address</label>
                <input type="text" name="address"
                       value="{{ old('address', $edit ? ($user->studentDetail->address ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>City</label>
                <input type="text" name="city"
                       value="{{ old('city', $edit ? ($user->studentDetail->city ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Country</label>
                <input type="text" name="country"
                       value="{{ old('country', $edit ? ($user->studentDetail->country ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Institute Name</label>
                <input type="text" name="institute_name"
                       value="{{ old('institute_name', $edit ? ($user->studentDetail->institute_name ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Program Name</label>
                <input type="text" name="program_name"
                       value="{{ old('program_name', $edit ? ($user->studentDetail->program_name ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Enrollment Year</label>
                <input type="text" name="enrollment_year"
                       value="{{ old('enrollment_year', $edit ? ($user->studentDetail->enrollment_year ?? '') : '') }}"
                       class="form-control border-1 bg-white">
            </div>

            <div class="col-md-6 mb-3">
                <label>Profile Image</label>
                <input type="file" name="profile_image" class="form-control border-1 bg-white">
                @if($edit && $user->studentDetail && $user->studentDetail->profile_image)
                    @php $prev = $resolveImg($user->studentDetail->profile_image, 'student'); @endphp
                    @if($prev)<img src="{{ $prev }}" width="100" class="mt-2 rounded border">@endif
                @endif
            </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">{{ $edit ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection
