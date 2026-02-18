@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h2>{{ $edit ? 'Edit User' : 'Add User' }}</h2>

    {{-- Role selection for new records only --}}
    @if (!$edit)
    <form method="GET" action="{{ route('admin.teachers.create') }}" class="mb-4">
        <div class="input-group" style="max-width: 300px;">
            <select name="role" class="form-select border-1 bg-white" onchange="this.form.submit()">
                <option value="">Select Role</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="teacher" {{ request('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="student" {{ request('role') == 'student' ? 'selected' : '' }}>Student</option>
            </select>
        </div>
    </form>
    @endif

    {{-- Only show form when role is chosen or editing --}}
    @if(request('role') || $edit)
    <form action="{{ $edit ? route('admin.teachers.update', $user->id) : route('admin.teachers.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @if ($edit) @method('PUT') @endif

        {{-- Hidden role --}}
        <input type="hidden" name="role" value="{{ $edit ? $user->role : request('role') }}">

        <div class="row">
            {{-- Common fields --}}
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $edit ? $user->email : '') }}" 
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

            {{-- Profile Image (all roles) --}}
            <div class="col-md-6 mb-3">
                <label>Profile Image</label>
                <input type="file" name="profile_image" class="form-control border-1 bg-white">
                @if($edit && $user->profile_image)
                    <div class="mt-2">
                        <img src="{{ asset($user->profile_image) }}" alt="Profile Image" width="80" class="rounded">
                    </div>
                @endif
            </div>

            {{-- Admin fields --}}
            @if (request('role') === 'admin' || ($edit && $user->role === 'admin'))
                <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $edit ? $user->adminDetail->first_name ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $edit ? $user->adminDetail->last_name ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $edit ? $user->adminDetail->phone ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Department</label>
                    <input type="text" name="department" value="{{ old('department', $edit ? $user->adminDetail->department ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
            @endif

            {{-- Teacher fields --}}
            @if (request('role') === 'teacher' || ($edit && $user->role === 'teacher'))
                <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $edit ? $user->teacherDetail->first_name ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $edit ? $user->teacherDetail->last_name ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ old('username', $edit ? $user->teacherDetail->username ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $edit ? $user->teacherDetail->phone ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Qualification</label>
                    <input type="text" name="qualification" value="{{ old('qualification', $edit ? $user->teacherDetail->qualification ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Experience</label>
                    <input type="text" name="experience" value="{{ old('experience', $edit ? $user->teacherDetail->experience ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Specialization</label>
                    <input type="text" name="specialization" value="{{ old('specialization', $edit ? $user->teacherDetail->specialization ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Bio</label>
                    <textarea name="bio" class="form-control border-1 bg-white">{{ old('bio', $edit ? $user->teacherDetail->bio ?? '' : '') }}</textarea>
                </div>
            @endif

            {{-- Student fields --}}
            @if (request('role') === 'student' || ($edit && $user->role === 'student'))
                <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $edit ? $user->studentDetail->first_name ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $edit ? $user->studentDetail->last_name ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ old('username', $edit ? $user->studentDetail->username ?? '' : '') }}" 
                           class="form-control border-1 bg-white" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $edit ? $user->studentDetail->phone ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control border-1 bg-white">
                        <option value="male" {{ old('gender', $edit ? $user->studentDetail->gender ?? '' : '') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $edit ? $user->studentDetail->gender ?? '' : '') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>DOB</label>
                    <input type="date" name="dob" value="{{ old('dob', $edit ? $user->studentDetail->dob ?? '' : '') }}" 
                           class="form-control border-1 bg-white">
                </div>
                   <div class="col-md-6">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control border-1 bg-white" value="{{ old('address') }}">
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

          <!-- City -->
        <div class="col-md-6">
            <label class="form-label">City</label>
            <input type="text" name="city" class="form-control border-1 bg-white" value="{{ old('city') }}">
            @error('city') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Country -->
        <div class="col-md-6">
            <label class="form-label">Country</label>
            <input type="text" name="country" class="form-control border-1 bg-white" value="{{ old('country') }}">
            @error('country') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
          <!-- Institute Name -->
        <div class="col-md-6">
            <label class="form-label">Institute Name</label>
            <input type="text" name="institute_name" class="form-control border-1 bg-white" value="{{ old('institute_name') }}">
            @error('institute_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Program Name -->
        <div class="col-md-6">
            <label class="form-label">Program Name</label>
            <input type="text" name="program_name" class="form-control border-1 bg-white" value="{{ old('program_name') }}">
            @error('program_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

         <!-- Enrollment Year -->
        <div class="col-md-6">
            <label class="form-label">Enrollment Year</label>
            <input type="text" name="enrollment_year" class="form-control border-1 bg-white" value="{{ old('enrollment_year') }}">
            @error('enrollment_year') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">{{ $edit ? 'Update' : 'Save' }}</button>
    </form>
    @endif
</div>
@endsection
