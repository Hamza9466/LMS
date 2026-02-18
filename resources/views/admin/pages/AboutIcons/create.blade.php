@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h2>Add About Icon</h2>

    <form action="{{ route('admin.about-icons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Icon -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Upload Icon Image</label>
                <input type="file" name="icon" class="form-control border-1 bg-white" accept="image/*">
                @error('icon') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Digits -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Digits</label>
                <input type="text" name="digits" class="form-control border-1 bg-white" value="{{ old('digits') }}">
                @error('digits') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Short Description -->
            <div class="col-md-12 mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="shortdescription" class="form-control border-1 bg-white">{{ old('shortdescription') }}</textarea>
                @error('shortdescription') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
        <a href="{{ route('admin.about-icons.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
