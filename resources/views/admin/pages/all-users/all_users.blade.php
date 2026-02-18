@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold text-primary">All Users</h4>

    <form method="GET" action="{{ route('admin.teachers.index') }}" class="mb-3">
        <div class="input-group " style="max-width: 300px;">
            <select name="role" class="form-select border-1 bg-white" onchange="this.form.submit()">
                <option value="">All Users</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admins</option>
                <option value="teacher" {{ request('role') == 'teacher' ? 'selected' : '' }}>Teachers</option>
                <option value="student" {{ request('role') == 'student' ? 'selected' : '' }}>Students</option>
            </select>
        </div>
    </form>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color: #fff;">
                        <tr>
                            <th class="px-3 py-3">#</th>
                            <th class="py-3">Name</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Role</th>
                            <th class="py-3">Created</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="border-bottom">
                                <td class="px-3">{{ $loop->iteration }}</td>
                                <td>
                                    @if ($user->role == 'admin' && $user->adminDetail)
                                        {{ $user->adminDetail->first_name }} {{ $user->adminDetail->last_name }}
                                    @elseif ($user->role == 'teacher' && $user->teacherDetail)
                                        {{ $user->teacherDetail->first_name }} {{ $user->teacherDetail->last_name }}
                                    @elseif ($user->role == 'student' && $user->studentDetail)
                                        {{ $user->studentDetail->first_name }} {{ $user->studentDetail->last_name }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge 
                                        @if($user->role == 'admin') bg-danger
                                        @elseif($user->role == 'teacher') bg-success
                                        @else bg-secondary
                                        @endif">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.teachers.show', $user->id) }}" 
                                       class="text-info me-2" title="View">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>
                                    <a href="{{ route('admin.teachers.edit', $user->id) }}" 
                                       class="text-warning me-2" title="Edit">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <form method="POST" 
                                          action="{{ route('admin.teachers.destroy', $user->id) }}" 
                                          class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                            class="btn btn-link text-danger p-0 m-0" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $users->appends(['role' => request('role')])->links() }}
    </div>
</div>
@endsection
