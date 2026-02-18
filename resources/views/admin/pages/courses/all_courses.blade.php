@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0 text-primary">Courses</h4>
        <a href="{{ route('courses.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Add Course
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color: #fff;">
                        <tr>
                            <th class="px-3 py-3">ID</th>
                            <th class="px-3 py-3">Title</th>
                            <th class="py-3">Teacher</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Price</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr class="border-bottom">
                                <td class="px-3">{{ $loop->iteration }}</td>
                                <td class="px-3">{{ $course->title }}</td>
                                <td>
                                    {{ $course->teacher && $course->teacher->teacherDetail
                                        ? $course->teacher->teacherDetail->first_name.' '.$course->teacher->teacherDetail->last_name
                                        : '—' }}
                                </td>
                                <td>
                                    @if($course->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $course->is_free ? 'Free' : '$'.number_format($course->price, 2) }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('courses.show', $course->id) }}" 
                                       class="text-info me-2" title="View">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>
                                    <a href="{{ route('sections.create', ['course_id' => $course->id]) }}" 
                                       class="text-primary me-2" title="Add Section">
                                        <i class="fas fa-layer-group fa-lg"></i>
                                    </a>
                                    <a href="{{ route('lessons.create', ['course_id' => $course->id]) }}" 
                                       class="text-primary me-2" title="Add Lesson">
                                        <i class="fas fa-book-open fa-lg"></i>
                                    </a>

                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('admin.personal-discounts.index', $course->id) }}" 
                                           class="text-warning me-2" title="Discounts">
                                            <i class="fas fa-percent fa-lg"></i>
                                        </a>
                                        <a href="{{ route('courses.edit', $course->id) }}" 
                                           class="text-primary me-2" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                class="btn btn-link text-danger p-0 m-0" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this course?')">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No courses found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    @if ($courses instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="d-flex justify-content-center mt-3">
            {{ $courses->links() }}
        </div>
    @endif
</div>
@endsection
