@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold">Gallery Image Details</h4>

    <div class="card p-3 shadow-sm">
        <div class="row">
            @foreach(['image1','image2','image3','image4'] as $field)
                <div class="col-md-3 mb-3 text-center">
                    <strong class="d-block mb-2">{{ ucfirst($field) }}</strong>
                    @if($aboutGalleryImage->$field)
                        <img src="{{ asset('storage/'.$aboutGalleryImage->$field) }}" class="img-fluid rounded shadow-sm" alt="{{ $field }}">
                    @else
                        <p class="text-muted">No Image</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('about-gallery-images.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection

