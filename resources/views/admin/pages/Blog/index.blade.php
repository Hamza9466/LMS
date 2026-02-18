@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0 text-primary">
            <i class="fas fa-blog me-2"></i> Blog Posts
        </h4>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> New Post
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm border-0 rounded-3">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color:#fff;">
                        <tr>
                            <th class="px-3 py-3"><i class="fas fa-hashtag"></i></th>
                            <th class="py-3"><i class="fas fa-heading me-1"></i> Title</th>
                            <th class="py-3"><i class="fas fa-user me-1"></i> Teacher</th>
                            <th class="py-3"><i class="fas fa-flag me-1"></i> Status</th>
                            <th class="py-3"><i class="fas fa-calendar-alt me-1"></i> Published</th>
                            <th class="py-3"><i class="fas fa-image me-1"></i> Image</th>
                            <th class="text-end py-3"><i class="fas fa-cogs me-1"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $i => $p)
                            <tr class="border-bottom">
                                <td class="px-3">{{ $posts->firstItem() + $i }}</td>
                                <td class="fw-semibold">{{ $p->title }}</td>
                                <td>{{ optional($p->teacher)->first_name }} {{ optional($p->teacher)->last_name }}</td>
                                <td>
                                    @if($p->status === 'scheduled')
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-clock me-1"></i> Scheduled
                                        </span>
                                    @elseif($p->status === 'published')
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle me-1"></i> Published
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="fas fa-pencil-alt me-1"></i> {{ ucfirst($p->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ optional($p->published_at)->format('Y-m-d H:i') }}
                                </td>
                                <td>
                                    @if($p->feature_image)
                                        <img src="{{ asset('storage/'.$p->feature_image) }}"
                                             alt="{{ $p->feature_image_alt ?? '' }}"
                                             class="rounded shadow-sm"
                                             style="height:45px; width:auto; object-fit:cover;">
                                    @else
                                        <span class="text-muted"><i class="fas fa-image"></i></span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a class="btn btn-sm btn-outline-info me-1" href="{{ route('admin.blog.show', $p) }}" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-primary me-1" href="{{ route('admin.blog.edit', $p) }}" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.blog.destroy', $p) }}"
                                          class="d-inline"
                                          onsubmit="return confirm('Delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle me-2"></i> No posts yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>
</div>
@endsection
