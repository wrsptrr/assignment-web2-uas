@extends('layout.app-backend')
@section('title', 'Purchase Detail')
@section('content')
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/backend/purchase') }}">Purchase</a></li>
    <li class="breadcrumb-item active" aria-current="page">Purchase Detail</li>
@endsection
<div class="container bg-white p-5 mb-4 shadow-sm">
   
    <!-- Info -->
    <table class="text-secondary text-uppercase">
        <tr>
            <td>NAME</td>
            <td>:</td>
            <td>{{ $user->first()->name }}</td>
        </tr>
        <tr>
            <td>PHONE</td>
            <td>:</td>
            <td>{{ $user->first()->phone }}</td>
        </tr>
        <tr>
            <td class="pr-5">ADDRESS</td>
            <td class="pr-3">:</td>
            <td>{{ $user->first()->address }}</td>
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