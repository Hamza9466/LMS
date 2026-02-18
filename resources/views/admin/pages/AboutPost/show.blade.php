@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>About Post Details</h2>

    <p><strong>ID:</strong> {{ $aboutPost->id }}</p>
    <p><strong>Heading:</strong> {{ $aboutPost->heading }}</p>
    <p><strong>Short Description:</strong> {{ $aboutPost->shortdescription }}</p>
    <p><strong>Image:</strong></p>
    @if($aboutPost->image)
        <img src="{{ asset('storage/' . $aboutPost->image) }}" width="200">
    @endif

    <br><br>
    <a href="{{ route('about-posts.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
