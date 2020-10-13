@extends('layout.app')
@section('title', 'Category')
@section('content')
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