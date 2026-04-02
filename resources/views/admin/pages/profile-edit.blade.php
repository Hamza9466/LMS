@extends('admin.layouts.main')

@section('content')
@php
    $admin = $user->adminDetail;
    $rawPath = $admin->profile_image ?? null;
    $profileImageUrl = asset('assets/admin/images/avatar/admin-default.png');
    if ($rawPath) {
        if (file_exists(public_path('storage/'.$rawPath))) {
            $profileImageUrl = asset('storage/'.$rawPath);
        } elseif (file_exists(public_path($rawPath))) {
            $profileImageUrl = asset($rawPath);
        }
    }
@endphp

<div class="dashboard-content">
    <div class="container">
        <h4 class="dashboard-title mb-3">Edit My Profile</h4>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label">Profile Image</label>
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <img
                                    src="{{ $profileImageUrl }}"
                                    alt="Profile"
                                    class="rounded-circle border"
                                    width="96"
                                    height="96"
                                    id="profilePreview"
                                >
                                <div>
                                    <input
                                        type="file"
                                        name="profile_image"
                                        accept="image/*"
                                        class="form-control @error('profile_image') is-invalid @enderror"
                                        id="profileImageInput"
                                    >
                                    <div class="form-text">JPEG, PNG, WebP or GIF. Max 2 MB.</div>
                                    @error('profile_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input
                                type="text"
                                name="first_name"
                                class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name', $admin->first_name ?? '') }}"
                                required
                            >
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input
                                type="text"
                                name="last_name"
                                class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name', $admin->last_name ?? '') }}"
                                required
                            >
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input
                                type="text"
                                name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $admin->phone ?? '') }}"
                            >
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <input
                                type="text"
                                name="department"
                                class="form-control @error('department') is-invalid @enderror"
                                value="{{ old('department', $admin->department ?? '') }}"
                            >
                            @error('department')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('admin.profile') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('profileImageInput')?.addEventListener('change', function (e) {
    const file = e.target.files && e.target.files[0];
    if (!file || !file.type.startsWith('image/')) return;
    const img = document.getElementById('profilePreview');
    if (img) img.src = URL.createObjectURL(file);
});
</script>
@endsection
