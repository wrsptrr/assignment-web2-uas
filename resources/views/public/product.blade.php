@extends('layout.app')
@section('title', 'Product')
@section('content')
<div class="container py-4 mb-5 text-uppercase">
    <!-- Search -->
    <form action="/product" method="GET">
        <div class="input-group mb-3">
        <input type="text" name="search" class="form-control form-search" placeholder="Search item by name">
        <div class="input-group-append">
            <button class="btn btn-outline-main" type="submit"><i class="fas fa-search mr-2"></i>SEARCH</button>
        </div>
        </div>
    </form>
    <!-- End Search -->

    <!-- Search Alert -->
    @if(isset($_GET['search']))
    <div class="alert alert-primary  alert-dismissible fade show" role="alert">
        Search result from : <strong>{{$_GET['search']}}</strong>
        <a href="{{ url('/product') }}">
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </a>
    </div>
    @endif
    <!-- End Search Alert -->

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
                    <a href="product/{{$data->id}}" class="btn btn-main form-control col-12" type="submit">BUY</a>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </div>
    <!-- End Item -->
</div>
@endsection