@extends('layout/app')
@section('title','Home')
@section('content')
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid header">
    <div class="container">
        <h1 class="display-4">
        NEW<br>
        <span class="header-heading-color-main">ARRIVAL</span><br>
        IS COMING
        </h1>
        <a class="btn header-btn my-3 px-5 py-2" href="/product">SHOP NOW</a>
    </div>
</div>
<!-- End Jumbotron -->

<!-- New Product -->
<section class="container mb-5">
    <!-- Title -->
    <h3 class="text-center text-secondary my-5">
        NEW PRODUCTS    
        <hr style="background:#dbb681; width:60px; height:2px;">
    </h3>
    <!-- End Title -->

    <!-- Product -->
    <div class="row">
        @foreach($product as $data)
        <div class="card col-3 product-home" style="border:none">
        <a href="/product/{{$data->id}}" class="text-decoration-none">
            <img src="{{ asset('image/product-image/'.$data->image) }}" class="card-img-top border-bottom" alt="Product Image">
            <div class="card-body text-center">
                <h5 class="card-text text-secondary text-uppercase">{{$data->product_name}}</h5>
                <p class="text-secondary">IDR {{number_format($data->price)}}</p>
            </div>
        </a>
        </div>
        @endforeach
    </div>
    <!-- End Product -->
</section>
<!-- End New Product -->

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid section-home">
    <div class="container text-right">
        <h1 class="display-4">
        BRAND NEW<br>
        <span class="header-heading-color-main">WOMEN</span>
        CATALOG
        </h1>
        <a class="btn header-btn my-3 px-5 py-2" href="/product">VIEW CATALOG</a>
    </div>
</div>
<!-- End Jumbotron -->

<!-- Category -->
<section class="container mb-5">
    <!-- Title -->
    <h3 class="text-center text-secondary my-5">
        PRODUCT CATEGORY    
        <hr style="background:#dbb681; width:60px; height:2px;">
    </h3>
    <!-- End Title -->

    <!-- Product -->
    <div class="row">
        @foreach($category as $data)
        <div class="card col-4 category-home" style="border:none">
        <a href="/category/{{ strtolower($data->category) }}" class="text-decoration-none">
            <img src="{{ asset('image/category-image/'.$data->image) }}" class="card-img-top border-bottom" alt="Category Image">
            <div class="card-body text-center">
                <h5 class="card-text text-secondary text-uppercase">{{$data->category}}</h5>
            </div>
        </a>
        </div>
        @endforeach
    </div>
    <!-- End Product -->
</section>
<!-- End Category -->
@endsection


