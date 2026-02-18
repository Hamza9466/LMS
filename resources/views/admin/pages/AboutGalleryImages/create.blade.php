@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold">Add Gallery Images</h4>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('about-gallery-images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Image 1</label>
            <input type="file" name="image1" class="form-control bg-white border-1">
        </div>

        <div class="mb-3">
            <label class="form-label">Image 2</label>
            <input type="file" name="image2" class="form-control bg-white border-1">
        </div>

        <div class="mb-3">
            <label class="form-label">Image 3</label>
            <input type="file" name="image3" class="form-control bg-white border-1">
        </div>

        <div class="mb-3">
            <label class="form-label">Image 4</label>
            <input type="file" name="image4" class="form-control bg-white border-1">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
