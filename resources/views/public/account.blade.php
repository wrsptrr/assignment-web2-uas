@extends('layout.app')
@section('title', 'Account')
@section('content')
<div class="container">

<!-- Alert -->
@if($message = Session::get('success'))
<div class="alert alert-primary mt-3 position-absolute" role="alert" style="left:0; right:0; margin-left:150px; margin-right:150px">
    {{ $message }}
</div>
@endif
<!-- End Alert -->

<div class="row">
    <!-- Picture -->
    <div class="col-5 pt-5">
    <center>
        <div class="acc">
        <img src="{{ asset('image/user-image/'.$user->image) }}" class="acc-pict mt-5"><br>
        </div>
    </center>
    </div>  
    <!-- End Picture -->

    <!-- Info -->
    <div class="col-7 pt-5">
        <table class="text-uppercase text-secondary mt-5">
            <tr>
                <td><h3>{{ $user->name }}</h3></td>
            </tr>
            <tr>
                <td><i class="fas fa-envelope mr-2"></i>{{ $user->email }}</td>
            </tr>
            <tr>
                <td><i class="fas fa-phone mr-2"></i>{{ $user->phone }}</td>
            </tr>
            <tr>
                <td><i class="fas fa-map-marker-alt mr-2"></i>{{ $user->address }}</td>
            </tr>
            <tr>
                <td class="pt-4">
                    <a href="/history" class="btn btn-main2 px-5">HISTORY</a>
                    <a href="/account/edit" class="btn btn-outline-main2 px-4">EDIT PROFILE</a>
                </td>
            </tr>
        </table>
    </div>
    <!-- End Info -->
</div>
</div>
@endsection