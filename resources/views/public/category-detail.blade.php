@extends('layout.app')
@section('title', 'Product')
@section('content')
<div class="container mb-5 pb-4 text-uppercase">
     <!-- Title -->
     <h3 class="text-center text-secondary my-5">
        {{ $categories }}
        <hr style="background:#dbb681; width:60px; height:2px;">
    </h3>
    <!-- End Title -->

    <!-- Item -->
    <div class="row">
        @foreach($product as $data)
        <div class="col-3 pb-4">
        <div class="card">
            <img src="{{ asset('image/product-image/'.$data->image) }}" class="card-img-top border-bottom" alt="Product Image">
            <div class="card-body">
                <h5 class="card-text text-secondary text-uppercase">{{$data->product_name}}</h5>
                <p class="text-secondary">IDR {{ number_format($data->price) }}</p>
                <div>
                    <a href="{{url('product/'.$data->id)}}" class="btn btn-main form-control col-12" type="submit">BUY</a>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </div>
    <!-- End Item -->
</div>
@endsection