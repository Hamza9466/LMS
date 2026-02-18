@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
  <h2>Edit Post</h2>
  @include('admin.pages.Blog.form', [
    'route'   => route('admin.blog.update', $post),
    'method'  => 'PUT',
    'post'    => $post,
    'tagsCsv' => $tagsCsv ?? ''
  ])
</div>
@endsection
