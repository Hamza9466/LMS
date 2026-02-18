@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h2>Edit About Post</h2>

    <form action="{{ route('about-posts.update', $aboutPost->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Current Image -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Current Image</label><br>
                @if($aboutPost->image)
                    <img src="{{ asset('storage/' . $aboutPost->image) }}" width="120" class="mb-2 rounded border">
                @endif
                <input type="file" name="image" class="form-control border-1 bg-white" accept="image/*">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Heading -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Heading</label>
                <input type="text" name="heading" class="form-control border-1 bg-white" value="{{ old('heading', $aboutPost->heading) }}">
                @error('heading') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Short Description -->
            <div class="col-md-12 mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="shortdescription" class="form-control border-1 bg-white">{{ old('shortdescription', $aboutPost->shortdescription) }}</textarea>
                @error('shortdescription') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('about-posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
