@extends('layout/dashboard')
@section('title', 'Category')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Category</li>
@endsection
@section('content')
<div class="container bg-white py-3">
   
    <!-- Search & Add-->
    <div class="row">
        <!-- Search Form -->
        <div class="col-10">
            <form action="{{ url('dashboard/category') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search by category name" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Search Form -->

        <!-- Button -->
        <div class="col-2">
            <button class="btn btn-primary col" data-toggle="modal" data-target="#add"><i class="fas fa-plus mr-2"></i>Add Category</button>
        </div>
        <!-- End Button -->
    </div>
    <!-- End Search & Add -->

    <!-- Search Alert -->
    @if(isset($_GET['search']))
    <div class="alert alert-primary  alert-dismissible fade show" role="alert">
        Search result from : <strong>{{$_GET['search']}}</strong>
        <a href="{{ url('dashboard/category') }}">
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
            <th scope="col">Image</th>
            <th scope="col">Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $data)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td><img src="{{ asset('image/category-image/'.$data->image) }}" width="80px;"></td>
            <td>{{ $data->category }}</td>
            <td>
                <div class="row">
                    <div>
                        <button class="btn btn-sm btn-primary mr-1 p-2" data-toggle="modal" data-target="#edit" data-category-id="{{ $data->id }}" data-category-name="{{ $data->category }}"><i class="fas fa-edit"></i></button>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-danger mr-1 p-2" data-toggle="modal" data-target="#delete" data-category-id="{{ $data->id }}" data-category-name="{{ $data->category }}"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <!-- End Main Content -->

    <div class="mt-3">
    {{ $category->links() }}
    </div>

</div>
@endsection

<!-- Add Modal -->
<div class="modal fade" id="add" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content container">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus mr-2"></i>Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('dashboard/category') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category" class="form-control" placeholder="insert category name" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="edit" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content container">
        <div class="modal-header">
            <h4 class="modal-title"><i class="fas fa-edit mr-2"></i>Edit Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('/dashboard/category/update') }}" method="POST" id="edit-form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <div class="modal-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category" id="category-name" class="form-control" placeholder="insert category name">
                </div>
                <div>
                    <input type="hidden" name="id" id="category-id">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Category</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End Edit Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content container">
        <div class="modal-header">
            <h4 class="modal-title"><i class="fas fa-trash mr-2"></i>Delete Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('dashboard/category/delete') }}" method="POST" id="delete">
        @csrf
        @method('DELETE')
            <div class="modal-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category" id="category-name" class="form-control" placeholder="insert category name" readonly>
                </div>
                <div>
                    <input type="hidden" name="id" id="category-id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End Delete Modal -->