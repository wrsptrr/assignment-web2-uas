@extends('layout.app-backend')
@section('title', 'Size')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Size</li>
@endsection
@section('content')
<div class="container bg-white py-3">
   
    <!-- Search & Add-->
    <div class="row">

        <!-- Search Form -->
        <div class="col-10">
            <form action="{{ url('backend/size') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search by size name" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
                </div>
            </form>
        </div>
        <!-- End Search Form -->

        <!-- Button -->
        <div class="col-2">
            <button class="btn btn-primary col" data-toggle="modal" data-target="#add"><i class="fas fa-plus mr-2"></i>Add Size</button>
        </div>
        <!-- End Button -->

    </div>
    <!-- End Search & Add -->

    <!-- Search Alert -->
    @if(isset($_GET['search']))
    <div class="alert alert-primary  alert-dismissible fade show" role="alert">
        Search result from : <strong>{{$_GET['search']}}</strong>
        <a href="{{ url('backend/size') }}">
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
            <th scope="col">Size Name</th>
            <th scope="col">Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($size as $data)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $data->size }}</td>
            <td>{{ $data->category['category'] }}</td>
            <td>
                <div class="row">
                    <div>
                        <button class="btn btn-sm btn-primary mr-1 p-2" data-toggle="modal" data-target="#edit" data-size-id="{{ $data->id }}" data-size-name="{{ $data->size }}"><i class="fas fa-edit"></i></button>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-danger mr-1 p-2" data-toggle="modal" data-target="#delete" data-size-id="{{ $data->id }}" data-size-name="{{ $data->size }}"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <!-- End Main Content -->
    <div class="mt-3">
    {{ $size->links() }}
    </div>

</div>
@endsection

<!-- Add Modal -->
<div class="modal fade" id="add" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content container">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus mr-2"></i>Add Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('backend/size') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Size Name</label>
                        <input type="text" name="size" class="form-control" placeholder="Insert size name" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($category as $category_data)
                            <option value="{{ $category_data->id }}">{{ $category_data->category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Size</button>
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
            <h4 class="modal-title"><i class="fas fa-edit mr-2"></i>Edit Size</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('backend/size/update') }}" method="POST" id="edit-form">
        @csrf
        @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label>Size Name</label>
                    <input type="text" name="size" id="size-name" class="form-control" placeholder="insert size name">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($category as $category_data)
                        <option value="{{ $category_data->id }}">{{ $category_data->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="hidden" name="id" id="size-id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Size</button>
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
            <h4 class="modal-title"><i class="fas fa-trash mr-2"></i>Delete Size</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('backend/size/delete') }}" method="POST" id="delete">
        @csrf
        @method('DELETE')
            <div class="modal-body">
                <div class="form-group">
                    <label>Size Name</label>
                    <input type="text" name="size" id="size-name" class="form-control" placeholder="insert size name" readonly>
                </div>
                <div>
                    <input type="hidden" name="id" id="size-id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Size</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End Delete Modal -->