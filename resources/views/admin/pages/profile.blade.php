{{-- resources/views/admin/profile/show.blade.php --}}
@extends('admin.layouts.main')

@section('content')
@php
    // Storage facade intentionally not used here to avoid fileinfo (finfo) dependency during simple existence checks

    /** @var \App\Models\User $user */
    $user = $user ?? auth()->user();

    // --- Resolve role (Spatie or role column) ---
    if (isset($roleFromController)) {
        $role = $roleFromController;
    } else {
        if (method_exists($user, 'hasRole')) {
            $role = $user->hasRole('admin') ? 'admin' : ($user->hasRole('teacher') ? 'teacher' : 'student');
        } else {
            $role = $user->role ?? 'student';
        }
    }

    // --- Eager-load relations safely ---
    try { $user->loadMissing(['studentDetail', 'teacherDetail', 'adminDetail']); } catch (\Throwable $e) {}

    // --- Pick role profile object ---
    $profile = match ($role) {
        'student' => $user->studentDetail ?? null,
        'teacher' => $user->teacherDetail ?? null,
        'admin'   => $user->adminDetail   ?? null,
        default   => null,
    };

    // --- Helpers ---
    $safe = fn ($v, $fallback = '—') => (isset($v) && $v !== '') ? $v : $fallback;

    // Display name: detail first/last → user->name → email prefix
    $displayName = trim(($profile->first_name ?? '').' '.($profile->last_name ?? ''));
    if ($displayName === '') {
        $displayName = $user->name ?? (explode('@', $user->email)[0] ?? 'User');
    }

    // Build an absolute URL to the stored profile image.
    // Supports:
    //  - Full URLs (http/https)
    //  - storage/app/public/uploads/{students|teachers|admins}/...
    //  - public/uploads/{students|teachers|admins}/...
    $toUrl = function (?string $raw, string $role) {
        if (!$raw || trim($raw) === '') return null;

        // Normalize
        $raw = str_replace('\\', '/', $raw);
        $raw = preg_replace('/^[A-Za-z]:\//', '', $raw); // strip Windows drive letter
        $raw = ltrim($raw, '/');

        // If it's a full URL already
        if (preg_match('#^https?://#i', $raw)) return $raw;

        // Ensure path is under uploads/{role}s/...
        if (!str_starts_with($raw, 'uploads/')) {
            $folder = $role === 'teacher' ? 'teachers' : ($role === 'student' ? 'students' : 'admins');
            // allow "students/xyz.jpg" etc
            if (preg_match('#^(students|teachers|admins)/#', $raw)) {
                $raw = "uploads/{$raw}";
            } else {
                $raw = "uploads/{$folder}/{$raw}";
            }
        }

        // 1) direct public path (public/uploads/...)
        if (file_exists(public_path($raw))) {
            return asset($raw);
        }

        // 2) public/storage mapped path (storage/app/public/...)
        if (file_exists(public_path('storage/'.$raw))) {
            return asset('storage/'.$raw);
        }

        return null;
    };

    // Choose first available image field
    $rawImage =
        ($user->profile_photo_path ?? null)  // Jetstream style
        ?: ($user->avatar ?? null)
        ?: ($user->profile_image ?? null)
        ?: ($profile->profile_image ?? null)
        ?: ($profile->avatar ?? null)
        ?: ($profile->photo ?? null);

    $profileImageUrl = $toUrl($rawImage, $role) ?? asset(match ($role) {
        'student' => 'assets/admin/images/avatar/student-default.png',
        'teacher' => 'assets/admin/images/avatar/teacher-default.png',
        default   => 'assets/admin/images/avatar/admin-default.png',
    });

    // Format DOB safely
    $fmtDob = function ($dob) {
        if (!$dob) return '—';
        try { return \Carbon\Carbon::parse($dob)->format('Y-m-d'); }
        catch (\Throwable $e) { return (string) $dob; }
    };
@endphp

<div class="dashboard-content">
    <div class="container">
        <h4 class="dashboard-title mb-3">My Profile</h4>

        <!-- Top Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <img src="{{ $profileImageUrl }}" alt="Profile image" class="rounded-circle border" width="88" height="88">
                    <div>
                        <span class="badge bg-primary-subtle text-primary fw-semibold">{{ strtoupper($role) }}</span>
                        <div class="fs-5 fw-bold mt-1">{{ $displayName }}</div>
                        <div class="text-muted">{{ $safe($user->email) }}</div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-3">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="small text-muted">Registration Date</div>
                        <div class="fw-semibold">{{ optional($user->created_at)->format('D d M Y, h:i a') ?? '—' }}</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="small text-muted">Username</div>
                        <div class="fw-semibold">{{ $safe($profile->username ?? $user->username) }}</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="small text-muted">Email</div>
                        <div class="fw-semibold">{{ $safe($user->email) }}</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="small text-muted">Phone Number</div>
                        <div class="fw-semibold">
                            @if($role === 'admin')
                                {{ $safe(($profile->phone ?? null) ?: ($user->phone ?? null)) }}
                            @else
                                {{ $safe($profile->phone ?? null) }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Role-specific Cards --}}
        @if ($role === 'student')
            <div class="card">
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">First Name</div>
                            <div class="fw-semibold">{{ $safe($profile->first_name) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">Last Name</div>
                            <div class="fw-semibold">{{ $safe($profile->last_name) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">Gender</div>
                            <div class="fw-semibold">{{ $safe($profile->gender) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">Date of Birth</div>
                            <div class="fw-semibold">{{ $fmtDob($profile->dob ?? null) }}</div>
                        </div>
                        <div class="col-12">
                            <div class="small text-muted">Address</div>
                            <div class="fw-semibold">{{ $safe($profile->address) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">City</div>
                            <div class="fw-semibold">{{ $safe($profile->city) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">Country</div>
                            <div class="fw-semibold">{{ $safe($profile->country) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">Institute</div>
                            <div class="fw-semibold">{{ $safe($profile->institute_name) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">Program</div>
                            <div class="fw-semibold">{{ $safe($profile->program_name) }}</div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="small text-muted">Enrollment Year</div>
                            <div class="fw-semibold">{{ $safe($profile->enrollment_year) }}</div>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($role === 'teacher')
            <div class="card">
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="small text-muted">First Name</div>
                            <div class="fw-semibold">{{ $safe($profile->first_name) }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-muted">Last Name</div>
                            <div class="fw-semibold">{{ $safe($profile->last_name) }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text muted">Qualification</div>
                            <div class="fw-semibold">{{ $safe($profile->qualification) }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-muted">Experience</div>
                            <div class="fw-semibold">{{ $safe($profile->experience) }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-muted">Specialization</div>
                            <div class="fw-semibold">{{ $safe($profile->specialization) }}</div>
                        </div>
                        <div class="col-12">
                            <div class="small text-muted">Bio</div>
                            <div class="fw-semibold">{{ $safe($profile->bio) }}</div>
                        </div>
                    </div>
                </div>
            </div>

        @else {{-- admin --}}
            <div class="card">
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="small text-muted">First Name</div>
                            <div class="fw-semibold">{{ $safe(optional($profile)->first_name ?? $user->first_name) }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="small text-muted">Last Name</div>
                            <div class="fw-semibold">{{ $safe(optional($profile)->last_name ?? $user->last_name) }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="small text-muted">Department</div>
                            <div class="fw-semibold">{{ $safe(optional($profile)->department) }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="small text-muted">Phone Number</div>
                            <div class="fw-semibold">{{ $safe(optional($profile)->phone ?? $user->phone) }}</div>
                        </div>
                        <div class="col-md-8">
                            <div class="small text-muted">Email</div>
                            <div class="fw-semibold">{{ $safe($user->email) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
