@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>View About Icon</h2>

    <p><strong>Icon:</strong></p>
    @if($aboutIcon->icon)
        <img src="{{ asset('storage/'.$aboutIcon->icon) }}" alt="Icon" width="100" height="100" class="mb-3">
    @else
        <p>No Icon Uploaded</p>
    @endif

    <p><strong>Digits:</strong> {{ $aboutIcon->digits }}</p>
    <p><strong>Short Description:</strong> {{ $aboutIcon->shortdescription }}</p>

    <a href="{{ route('admin.about-icons.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
