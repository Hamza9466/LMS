@extends('admin.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add Blog Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blog-categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" required>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
