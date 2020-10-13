@extends('layout.app')
@section('title', 'Shopping Cart')
@section('content')

<div class="container py-5 text-uppercase">

    <!-- Alert -->
    @if($message = Session::get('success'))
    <div class="alert alert-primary" role="alert">
        {{ $message }}
    </div>
    @endif
    <!-- End Alert -->

    <!-- Table -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Picture</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-secondary">
        @foreach($tmp as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('image/product-image/'.$data->product->image) }}"  width="60px"></td>
                <td>{{ $data->product->product_name }}</td>
                <td>{{ $data->size }}</td>
                <td>{{ $data->qty }}</td>
                <td class="text-capitalize">Rp. {{ number_format($data->product->price) }}</td>
                <?php
                    $total  =   $data->product->price * $data->qty;
                ?>
                <td class="text-capitalize">Rp. {{ number_format($total) }}</td>
                <td class="text-center text-nowrap">
                <form action="cart/delete/{{ $data->id }}" method="POST">
                @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- End Table -->

    <div class="text-right">
        <a href="/checkout" class="btn btn-main mt-3 px-4"><i class="fas fa-shopping-cart mr-2"></i>CHECKOUT</a>
    </div>
</div>
@endsection