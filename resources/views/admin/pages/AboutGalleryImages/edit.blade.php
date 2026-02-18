@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold">Edit Gallery Images</h4>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('about-gallery-images.update', $aboutGalleryImage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="row">
            @foreach(['image1','image2','image3','image4'] as $field)
                <div class="col-md-6 mb-3">
                    <label class="form-label">{{ ucfirst($field) }}</label><br>
                    @if($aboutGalleryImage->$field)
                        <img src="{{ asset('storage/'.$aboutGalleryImage->$field) }}" class="img-thumbnail mb-2" width="120">
                    @endif
                    <input type="file" name="{{ $field }}" class="form-control bg-white border-1">
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
