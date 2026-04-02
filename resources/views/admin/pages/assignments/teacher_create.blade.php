@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4" style="max-width: 720px;">
        <h4 class="dashboard-title mb-4">Create assignment</h4>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form method="POST" action="{{ route('teacher.assignments.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Course</label>
                        <select name="course_id" class="form-select" required>
                            <option value="">Select course</option>
                            @foreach($courses as $c)
                                <option value="{{ $c->id }}" @selected(old('course_id') == $c->id)>{{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Task title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="datetime-local" name="deadline_at" class="form-control" value="{{ old('deadline_at') }}" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('teacher.assignments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
