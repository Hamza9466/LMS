@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0 text-primary">About Posts</h4>
        <a href="{{ route('about-posts.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus me-1"></i> Add About Post
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success shadow-sm border-0 rounded-3">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color:#fff;">
                    <tr>
                        <th class="px-3 py-3">#</th>
                        <th class="px-3 py-3">Image</th>
                        <th class="py-3">Heading</th>
                        <th class="py-3">Short Description</th>
                        <th class="py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aboutPosts as $post)
                        <tr class="border-bottom">
                            <td class="px-3">{{ $post->id }}</td>
                            <td>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" 
                                         class="rounded shadow-sm" 
                                         style="width:80px; height:60px; object-fit:cover;">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>{{ $post->heading }}</td>
                            <td>{{ $post->shortdescription }}</td>
                            <td class="text-center">
                                <a href="{{ route('about-posts.show', $post->id) }}" 
                                   class="text-info me-2" title="View">
                                    <i class="fas fa-eye fa-lg"></i>
                                </a>
                                <a href="{{ route('about-posts.edit', $post->id) }}" 
                                   class="text-warning me-2" title="Edit">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                <form action="{{ route('about-posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0 m-0" 
                                            title="Delete" 
                                            onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="fas fa-info-circle me-2"></i> No posts found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($aboutPosts instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="d-flex justify-content-center mt-3">
                {{ $aboutPosts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
