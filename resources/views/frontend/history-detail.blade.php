@extends('layout.app')
@section('title', 'History Detail')
@section('content')

<div class="container py-5 text-uppercase">

    <!-- Info -->
    <table class="text-secondary text-uppercase">
        <tr>
            <td>NAME</td>
            <td>:</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>PHONE</td>
            <td>:</td>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <td class="pr-5">ADDRESS</td>
            <td class="pr-3">:</td>
            <td>{{ $user->address }}</td>
        </tr>
        @foreach($purchase as $_data)
        <tr>
            <td class="pr-5">DATE</td>
            <td class="pr-3">:</td>
            <td>{{ $_data->date }}</td>
        </tr>
        <tr>
            <td class="pr-5">PAYMENT METHOD</td>
            <td class="pr-3">:</td>
            <td>{{ $_data->payment }}</td>
        </tr>
        <tr>
            <td class="pr-5">TOTAL</td>
            <td class="pr-3">:</td>
            <td class="text-capitalize">Rp. {{ number_format($_data->total) }}</td>
        </tr>
        @endforeach
    </table>
    <!-- End Info -->

    <!-- Print -->
    @foreach($purchase as $print)
    <a href="{{ url('history/detail/print/'.$print->id) }}" target="_blank" class="btn btn-outline-main mt-3 px-5"><i class="fas fa-print mr-2"></i>Print</a>
    @endforeach
    <!-- End Print -->

    <!-- Table -->
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Picture</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody class="text-secondary">
        @foreach($purchasedetail as $data)
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
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- End Table -->
</div>
@endsection