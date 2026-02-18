@extends('admin.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-primary">
            <i class="fas fa-tags me-2"></i> Blog Categories
        </h3>
        <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Category
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
                            <th class="py-3"><i class="fas fa-font me-1"></i> Name</th>
                            <th class="py-3"><i class="fas fa-link me-1"></i> Slug</th>
                            <th class="text-end py-3"><i class="fas fa-cogs me-1"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="border-bottom">
                            <td class="px-3">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $category->name }}</td>
                            <td><span class="text-muted"><i class="fas fa-link me-1"></i>{{ $category->slug }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('admin.blog-categories.edit', $category->id) }}" 
                                   class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blog-categories.destroy', $category->id) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="fas fa-info-circle me-2"></i> No categories found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
