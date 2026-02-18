@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold">User Details</h4>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

            {{-- Admin --}}
            @if ($user->role === 'admin' && $user->adminDetail)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $user->adminDetail->profile_image) }}" 
                         alt="Profile Image" width="120" height="120" 
                         class="rounded-circle">
                </div>
                <p><strong>Name:</strong> {{ $user->adminDetail->first_name }} {{ $user->adminDetail->last_name }}</p>
                <p><strong>Phone:</strong> {{ $user->adminDetail->phone }}</p>

            {{-- Teacher --}}
            @elseif ($user->role === 'teacher' && $user->teacherDetail)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $user->teacherDetail->profile_image) }}" 
                         alt="Profile Image" width="120" height="120" 
                         class="rounded-circle">
                </div>
                <p><strong>Name:</strong> {{ $user->teacherDetail->first_name }} {{ $user->teacherDetail->last_name }}</p>
                <p><strong>Username:</strong> {{ $user->teacherDetail->username }}</p>
                <p><strong>Phone:</strong> {{ $user->teacherDetail->phone }}</p>
                <p><strong>Qualification:</strong> {{ $user->teacherDetail->qualification }}</p>
                <p><strong>Experience:</strong> {{ $user->teacherDetail->experience }}</p>
                <p><strong>Specialization:</strong> {{ $user->teacherDetail->specialization }}</p>
                <p><strong>Bio:</strong> {{ $user->teacherDetail->bio }}</p>

            {{-- Student --}}
            @elseif ($user->role === 'student' && $user->studentDetail)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $user->studentDetail->profile_image) }}" 
                         alt="Profile Image" width="120" height="120" 
                         class="rounded-circle">
                </div>
                <p><strong>Name:</strong> {{ $user->studentDetail->first_name }} {{ $user->studentDetail->last_name }}</p>
                <p><strong>Username:</strong> {{ $user->studentDetail->username }}</p>
                <p><strong>Phone:</strong> {{ $user->studentDetail->phone }}</p>
                <p><strong>Gender:</strong> {{ $user->studentDetail->gender }}</p>
                <p><strong>Date of Birth:</strong> {{ $user->studentDetail->dob }}</p>
                <p><strong>Address:</strong> {{ $user->studentDetail->address }}</p>
                <p><strong>City:</strong> {{ $user->studentDetail->city }}</p>
                <p><strong>Country:</strong> {{ $user->studentDetail->country }}</p>
                <p><strong>Institute:</strong> {{ $user->studentDetail->institute_name }}</p>
                <p><strong>Program:</strong> {{ $user->studentDetail->program_name }}</p>
                <p><strong>Enrollment Year:</strong> {{ $user->studentDetail->enrollment_year }}</p>

            @else
                <p>No additional profile details available.</p>
            @endif

            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
