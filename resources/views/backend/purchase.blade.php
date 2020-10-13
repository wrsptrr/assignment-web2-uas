@extends('layout.app-backend')
@section('title', 'Purchase History')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Purchase</li>
@endsection
@section('content')
<div class="container bg-white py-3">
   
    <!-- Search & Add-->
    <div class="row">

        <!-- Search Form -->
        <div class="col-12">
            <form action="{{ url('backend/purchase') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search by ID bill">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
                </div>
            <form>
        </div>
        <!-- End Search Form -->

    </div>
    <!-- End Search & Add -->

    <!-- Search Alert -->
    @if(isset($_GET['search']))
    <div class="alert alert-primary  alert-dismissible fade show" role="alert">
        Search result from : <strong>{{$_GET['search']}}</strong>
        <a href="{{ url('backend/purchase') }}">
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </a>
    </div>
    @endif
    <!-- End Search Alert -->

    <!-- Main Content -->
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Bill</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Payment Method</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($purchase as $data)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $data->id }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->date }}</td>
            <td>{{ $data->payment }}</td>
            <td>
                <a href="/backend/purchase/{{$data->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <!-- End Main Content -->

    <div class="mt-3">
    {{ $purchase->links() }}
    </div>

</div>
@endsection