@php $isEdit = isset($post); @endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="row g-3 ">
    @csrf
    @if (($method ?? '') === 'PUT')
        @method('PUT')
    @endif

    <div class="col-md-6 border p-3 rounded">
        <label class="form-label fw-bold">Teacher</label>
        <select name="teacher_detail_id" class="form-select border-1 bg-white" required>
            <option value="">-- Select Teacher --</option>
            @foreach ($teachers as $t)
                <option value="{{ $t->id }}" @selected(old('teacher_detail_id', $post->teacher_detail_id ?? '') == $t->id)>
                    {{ $t->first_name }} {{ $t->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 border p-3 rounded">
        <label class="form-label fw-bold">Status</label>
        <select name="status" class="form-select border-1 bg-white" required>
            @foreach (['draft', 'scheduled', 'published', 'archived'] as $st)
                <option value="{{ $st }}" @selected(old('status', $post->status ?? 'draft') === $st)>{{ ucfirst($st) }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 border p-3 rounded">
    <label class="form-label fw-bold">Blog Category</label>
    <select name="categories[]" class="form-select select2 border-1 bg-white" multiple required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('categories')
                    ? in_array($category->id, old('categories'))
                    : $isEdit && $post->categories->contains($category->id)
                )>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>



    <div class="col-md-8 border p-3 rounded">
        <label class="form-label fw-bold">Title</label>
        <input type="text" name="title" class="form-control border-1 bg-white" required
            value="{{ old('title', $post->title ?? '') }}">
    </div>

    <div class="col-md-4 border p-3 rounded">
        <label class="form-label fw-bold">Slug (optional)</label>
        <input type="text" name="slug" class="form-control border-1 bg-white" value="{{ old('slug', $post->slug ?? '') }}">
    </div>

    <div class="col-md-6 border p-3 rounded">
        <label class="form-label fw-bold">Feature Image</label>
        <input type="file" name="feature_image" class="form-control border-1 bg-white" accept="image/*">
        @if ($isEdit && $post->feature_image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $post->feature_image) }}" alt="" style="max-height:120px"
                    class="img-thumbnail">
            </div>
        @endif
    </div>

    <div class="col-md-6 border p-3 rounded">
        <label class="form-label fw-bold">Image Alt Text</label>
        <input type="text" name="feature_image_alt" class="form-control border-1 bg-white"
            value="{{ old('feature_image_alt', $post->feature_image_alt ?? '') }}">
    </div>

    <div class="col-12 border p-3 rounded">
        <label class="form-label fw-bold">Short Description</label>
        <input type="text" name="short_description" class="form-control border-1 bg-white"
            value="{{ old('short_description', $post->short_description ?? '') }}">
    </div>

    <div class="col-12 border p-3 rounded">
        <label class="form-label fw-bold">Long Description</label>
        <textarea name="long_description" class="form-control border-1 bg-white" rows="6">{{ old('long_description', $post->long_description ?? '') }}</textarea>
    </div>

    <div class="col-12 border p-3 rounded">
        <label class="form-label fw-bold">Quotation</label>
        <textarea name="quotation" class="form-control border-1 bg-white" rows="3">{{ old('quotation', $post->quotation ?? '') }}</textarea>
    </div>

    <div class="col-md-4 border p-3 rounded">
        <label class="form-label fw-bold">Published At</label>
        <input type="datetime-local" name="published_at" class="form-control border-1 bg-white"
            value="{{ old('published_at', isset($post->published_at) ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
    </div>

    <div class="col-md-4 border p-3 rounded">
        <label class="form-label fw-bold">Featured?</label>
        <select name="is_featured" class="form-select border-1 bg-white">
            <option value="0" @selected(old('is_featured', $post->is_featured ?? 0) == 0)>No</option>
            <option value="1" @selected(old('is_featured', $post->is_featured ?? 0) == 1)>Yes</option>
        </select>
    </div>

    <div class="col-md-4 border p-3 rounded">
        <label class="form-label fw-bold">Tags (comma separated)</label>
        <input type="text" name="tags" class="form-control border-1 bg-whitejoznk" value="{{ old('tags', $tagsCsv ?? '') }}"
            placeholder="education, technology, tips">
    </div>

    <div class="col-12 d-flex gap-2 mt-3">
        <button class="btn btn-primary">{{ $isEdit ? 'Update' : 'Create' }}</button>
        <a class="btn btn-light" href="{{ route('admin.blog.index') }}">Cancel</a>
    </div>
</form>
