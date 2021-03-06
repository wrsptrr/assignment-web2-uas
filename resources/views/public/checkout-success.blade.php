@extends('layout.app')
@section('title', 'Checkout Success')
@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1>
            <i class="fas fa-thumbs-up text-main" style="font-size:100pt"></i><br>
            <p class="mt-3 text-secondary">CHECKOUT <span class="text-main">SUCCESS</span></p>
        </h1>
        <a href="/history" class="btn btn-outline-main2">HISTORY</a>
        <a href="/product" class="btn btn-main2">SHOPING AGAIN</a>
    </div>
</div>
@endsection