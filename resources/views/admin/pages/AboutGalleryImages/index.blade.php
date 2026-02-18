@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0 text-primary">About Gallery Images</h4>
        <a href="{{ route('about-gallery-images.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus me-1"></i> Add New
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color:#fff;">
                    <tr>
                        <th class="px-3 py-3">#</th>
                        <th class="py-3">Image 1</th>
                        <th class="py-3">Image 2</th>
                        <th class="py-3">Image 3</th>
                        <th class="py-3">Image 4</th>
                        <th class="py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleryImages as $item)
                        <tr class="border-bottom">
                            <td class="px-3">{{ $item->id }}</td>
                            <td>
                                @if($item->image1)
                                    <img src="{{ asset('storage/'.$item->image1) }}" 
                                         class="rounded shadow-sm" style="width:80px; height:60px; object-fit:cover;">
                                @endif
                            </td>
                            <td>
                                @if($item->image2)
                                    <img src="{{ asset('storage/'.$item->image2) }}" 
                                         class="rounded shadow-sm" style="width:80px; height:60px; object-fit:cover;">
                                @endif
                            </td>
                            <td>
                                @if($item->image3)
                                    <img src="{{ asset('storage/'.$item->image3) }}" 
                                         class="rounded shadow-sm" style="width:80px; height:60px; object-fit:cover;">
                                @endif
                            </td>
                            <td>
                                @if($item->image4)
                                    <img src="{{ asset('storage/'.$item->image4) }}" 
                                         class="rounded shadow-sm" style="width:80px; height:60px; object-fit:cover;">
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('about-gallery-images.show',$item->id) }}" 
                                   class="text-info me-2" title="View">
                                    <i class="fas fa-eye fa-lg"></i>
                                </a>
                                <a href="{{ route('about-gallery-images.edit',$item->id) }}" 
                                   class="text-warning me-2" title="Edit">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                <form action="{{ route('about-gallery-images.destroy',$item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0 m-0" 
                                            title="Delete" 
                                            onclick="return confirm('Delete this record?')">
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-info-circle me-2"></i> No gallery images found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($galleryImages instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="d-flex justify-content-center mt-3">
                {{ $galleryImages->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
