@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-light mb-3">← Back</a>

    <h2 class="mb-2">{{ $post->title }}</h2>
    <div class="text-muted mb-3">
        By {{ optional($post->teacher)->first_name }} {{ optional($post->teacher)->last_name }}
        • {{ optional($post->published_at)->format('M d, Y H:i') }}
        • {{ $post->views ?? 0 }} views
    </div>

    <div class="row g-3">
        <div class="col-md-6 border p-3 rounded">
            <strong>Teacher:</strong> {{ optional($post->teacher)->first_name }} {{ optional($post->teacher)->last_name }}
        </div>

        <div class="col-md-6 border p-3 rounded">
            <strong>Status:</strong> {{ ucfirst($post->status) }}
        </div>

     <div class="col-md-6 border p-3 rounded">
    <strong>Category:</strong>
    @if($post->categories && $post->categories->isNotEmpty())
        @foreach($post->categories as $c)
            <span class="badge bg-info text-dark">{{ $c->name }}</span>
        @endforeach
    @else
        N/A
    @endif
</div>


        <div class="col-md-6 border p-3 rounded">
            <strong>Featured?</strong> {{ $post->is_featured ? 'Yes' : 'No' }}
        </div>

        <div class="col-md-6 border p-3 rounded">
            <strong>Feature Image:</strong><br>
            @if($post->feature_image)
                <img src="{{ asset('storage/'.$post->feature_image) }}" alt="{{ $post->feature_image_alt ?? '' }}" style="max-height:150px" class="img-thumbnail mt-1">
            @else
                N/A
            @endif
        </div>

        <div class="col-12 border p-3 rounded">
            <strong>Short Description:</strong>
            <p>{{ $post->short_description ?? '-' }}</p>
        </div>

        <div class="col-12 border p-3 rounded">
            <strong>Long Description:</strong>
            <p>{!! nl2br(e($post->long_description ?? '-')) !!}</p>
        </div>

        @if($post->quotation)
            <div class="col-12 border p-3 rounded">
                <strong>Quotation:</strong>
                <blockquote class="blockquote p-3 bg-light rounded">{{ $post->quotation }}</blockquote>
            </div>
        @endif

        {{-- <div class="col-12 border p-3 rounded">
            <strong>Tags:</strong>
            @if($post->tags->isNotEmpty())
                @foreach($post->tags as $t)
                    <span class="badge bg-light text-dark">{{ $t->name }}</span>
                @endforeach
            @else
                N/A
            @endif
        </div> --}}

        <div class="col-md-4 border p-3 rounded">
            <strong>Published At:</strong> {{ optional($post->published_at)->format('Y-m-d H:i') ?? '-' }}
        </div>
    </div>
</div>
@endsection
