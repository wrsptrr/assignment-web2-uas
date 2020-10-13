@extends('layout.app')
@section('title', 'Product Detail')
@section('content')
<div class="container py-4 mb-5 text-uppercase">
    @foreach($product as $data)
    <div class="card mt-5 mb-3 col-10 mx-auto" style="border:none;">
    <div class="row no-gutters">
        <div class="col-md-4">
        <img src="{{ asset('image/product-image/'.$data->image) }}" class="card-img" alt="...">
        </div>
        <div class="col-md-4">
        <div class="card-body">
            <h3 class="card-text text-secondary text-uppercase">{{$data->product_name}}</h3>
            <p class="text-secondary">{{ $data->category->category }}
            <br>IDR {{ number_format($data->price) }}</p>
            <div>
            <form action="/product/cart/{{$data->id}}" method="post" class="mt-4">
            @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="row mb-2">
                    <div class="col-6 pr-1">
                    <small class="form-text text-muted mb-1">Size</small>
                    <select name="size" class="form-control">
                        @foreach($size as $data)
                        <option value="{{ $data->size }}">{{ $data->size }}</option>
                        @endforeach
                    </select>
                    
                    </div>
                    <div class="col-6 pl-0">
                    <small class="form-text text-muted mb-1">Qty</small>
                    <select name="qty" class="form-control">
                    @for($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    </select>
                    </div>
                </div>
                <button class="btn btn-main form-control col-12" type="submit">BUY</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    @endforeach
</div>
@endsection