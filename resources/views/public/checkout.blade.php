@extends('layout.app')
@section('title', 'Checkout')
@section('content')
<div class="container py-5">
    <!-- Info -->
    <table class="text-secondary text-uppercase">
        <tr>
            <td>NAME</td>
            <td>:</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>:</td>
            <td>{{ $user->email }}</td>
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
    </table>
    <!-- End Info -->

    <!-- Item -->
    <table class="table table-hover mt-3 text-uppercase">
        <thead>
            <tr>
                <th>No</th>
                <th>Picture</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Qty</th>
                <th>Price</th>
                <th>SubTotal</th>  
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
            </tr>
        @endforeach
        </tbody>
        <?php
            $subtotal = 0;
            foreach($tmp as $data)
            {
                $total      =   $data->product->price * $data->qty;
                $subtotal   =   $subtotal + $total;
            }
        ?>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <th>total :</th>
                <th class="text-capitalize">Rp. {{ number_format($subtotal) }}</th>
            </tr>
        </tfoot>
    </table>
    <!-- End Item -->

    <!-- Payment Method -->
    <div class="col-4">
    <h5>CHOOSE PAYMENT METHOD</h5>
    <form action="/checkout/finish" method="POST">
    @csrf
    <input type="hidden" name="total" value="{{ $subtotal }}">
    <div class="row py-3">
        <div class="input-group col-4">
        <div class="input-group-prepend">
            <div class="input-group-text py-2 px-4 pm">
            <input type="radio" value="COD" name="pm"><div class="pl-4">COD</div>
            </div>
        </div>
        </div>

        <div class="input-group col-4">
        <div class="input-group-prepend">
            <div class="input-group-text pm col-12">
            <input type="radio" value="TRANSFER" name="pm" required><div class="pl-4">TRANSFER</div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Button -->
    <div class="">
        <button type="submit" class="btn header-btn mt-3 ml-3 px-4"><i class="fas fa-shopping-cart mr-2"></i>CONFIRM</button>
    </div>
    <!-- End Button -->
    </form>
</div>
@endsection