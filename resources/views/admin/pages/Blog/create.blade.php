@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
  <h2>Create Post</h2>
  @include('admin.pages.Blog.form', [
    'route' => route('admin.blog.store'),
    'method' => 'POST'
  ])
</div>
@endsection
