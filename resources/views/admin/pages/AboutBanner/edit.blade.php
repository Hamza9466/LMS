@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold">Edit Banner</h4>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.about-banners.update', $aboutBanner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Banner Image</label>
            <input type="file" name="banner_image"class="form-control bg-white border-1">
            @if($aboutBanner->banner_image)
                <img src="{{ asset('storage/'.$aboutBanner->banner_image) }}" width="150" class="mt-2 rounded">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Text1</label>
            <input type="text" name="text1" class="form-control bg-white border-1" value="{{ $aboutBanner->text1 }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Text2</label>
            <input type="text" name="text2" class="form-control bg-white border-1" value="{{ $aboutBanner->text2 }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
