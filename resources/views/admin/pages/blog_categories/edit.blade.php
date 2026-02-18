@extends('admin.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <h3>Edit Category</h3>
        <form action="{{ route('admin.blog-categories.update', $blogCategory->id) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $blogCategory->name }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
