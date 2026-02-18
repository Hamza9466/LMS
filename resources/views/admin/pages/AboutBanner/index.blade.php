@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0 text-primary">About Banners</h4>
        <a href="{{ route('admin.about-banners.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Add Banner
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm border-0 rounded-3">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color:#fff;">
                    <tr>
                        <th class="px-3 py-3">#</th>
                        <th class="px-3 py-3">Banner</th>
                        <th class="py-3">Text1</th>
                        <th class="py-3">Text2</th>
                        <th class="py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banners as $index => $banner)
                        <tr class="border-bottom">
                            <td class="px-3">{{ $index + 1 }}</td>
                            <td>
                                @if($banner->banner_image)
                                    <img src="{{ asset('storage/'.$banner->banner_image) }}" 
                                         class="rounded shadow-sm" 
                                         style="width: 80px; height: auto; object-fit: cover;">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>{{ $banner->text1 }}</td>
                            <td>{{ $banner->text2 }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.about-banners.edit', $banner->id) }}" 
                                   class="text-primary me-2" title="Edit Banner">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                <form action="{{ route('admin.about-banners.destroy', $banner->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0 m-0" 
                                            title="Delete Banner" 
                                            onclick="return confirm('Are you sure you want to delete this banner?')">
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="fas fa-info-circle me-2"></i> No banners found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($banners instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="d-flex justify-content-center mt-3">
                {{ $banners->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
