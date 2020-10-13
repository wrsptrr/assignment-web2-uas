@extends('layout.app')
@section('title', 'Account')
@section('content')
<div class="container">
<div class="row">
    <!-- Picture -->
    <div class="col-5 pt-5">
    <center>
        <div class="acc">
        <img src="{{ asset('image/user-image/'.$user->image) }}" class="acc-pict mt-5"><br>
        <a href="" class="btn btn-outline-main mt-3" data-toggle="modal" data-target="#edit">Change Picture</a>
        </div>
    </center>
    </div>  
    <!-- End Picture -->

    <!-- Info -->
    <div class="col-7 pt-5">
    <form action="{{ url('/account/update') }}" method="POST">
    @csrf
        <div class="form-group row mt-3">
            <label for="name" class="col-md-4 col-form-label text-md-right"></label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" placeholder="NAME" value="{{ $user->name }}" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="EMAIL" required autocomplete="email" value="{{ $user->email}}">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mt-3">
            <label for="phone" class="col-md-4 col-form-label text-md-right"></label>

            <div class="col-md-6">
                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" placeholder="PHONE" value="{{ $user->phone }}" autofocus>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mt-3">
            <label for="address" class="col-md-4 col-form-label text-md-right"></label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" placeholder="ADDRESS" value="{{ $user->address }}" autofocus>

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4 text-right">
                <button type="submit" class="btn btn-main px-5 text-uppercase">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
    </div>
    <!-- End Info -->
</div>
</div>
@endsection

<!-- Edit Modal -->
<div class="modal fade" id="edit" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content container">
        <div class="modal-header">
            <h4 class="modal-title font-weight-normal"><i class="fas fa-image mr-2"></i>Change Picture</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('/account/picture/update') }}" method="POST" id="edit-form" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                    <small class="text-muted">* Picture must be in 1:1 ratio</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-main">Update Picture</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End Edit Modal -->