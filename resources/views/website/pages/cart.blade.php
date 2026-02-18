
@extends('website.layouts.main')
@section('content')


<div class="container py-5">
    <h3 class="mb-4">Your Cart</h3>

    @if(empty($items))
        <div class="alert alert-light border">Your cart is empty.</div>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th class="text-end">Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $it)
                        <tr>
                            <td>
                                <a href="{{ route('CourseDetail', ['slug' => $it['slug']]) }}">
                                    {{ $it['title'] }}
                                </a>
                            </td>
                            <td class="text-end">
                                {{ $it['price'] == 0 ? 'Free' : '$'.number_format($it['price'],2) }}
                            </td>
                            <td class="text-center">{{ $it['qty'] }}</td>
                            <td class="text-end">
                                {{ $it['price'] == 0 ? '—' : '$'.number_format($it['price']*$it['qty'],2) }}
                            </td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('cart.remove') }}">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $it['id'] }}">
                                    <button class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th class="text-end">${{ number_format($total,2) }}</th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
