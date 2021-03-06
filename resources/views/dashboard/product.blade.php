@extends('layout/dashboard')
@section('title', 'Product')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Product</li>
@endsection
@section('content')
<div class="container bg-white py-3">

    <!-- Search & Add-->
    <div class="row">

        <!-- Search Form -->
        <div class="col-10">
            <form action="{{ url('dashboard/product') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search by product name"
                        aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Search Form -->

        <!-- Button -->
        <div class="col-2">
            <button class="btn btn-primary col" data-toggle="modal" data-target="#add"><i
                    class="fas fa-plus mr-2"></i>Add Product</button>
        </div>
        <!-- End Button -->

    </div>
    <!-- End Search & Add -->

    <!-- Search Alert -->
    @if(isset($_GET['search']))
    <div class="alert alert-primary  alert-dismissible fade show" role="alert">
        Search result from : <strong>{{$_GET['search']}}</strong>
        <a href="{{ url('dashboard/product') }}">
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
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $data)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td><img src="{{ asset('image/product-image/'.$data->image) }}" width="80px;"></td>
                <td>{{ $data->product_name }}</td>
                <td>{{ $data->category['category'] }}</td>
                <td>Rp. {{ number_format($data->price) }}</td>
                <td>
                    <div class="row">
                        <div>
                            <button class="btn btn-sm btn-primary mr-1 p-2" data-toggle="modal" data-target="#edit"
                                data-product-id="{{ $data->id }}" data-product-name="{{ $data->product_name }}"
                                data-product-price="{{ $data->price }}"><i class="fas fa-edit"></i></button>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-danger mr-1 p-2" data-toggle="modal" data-target="#delete"
                                data-product-id="{{ $data->id }}" data-product-name="{{ $data->product_name }}"
                                data-product-price="{{ $data->price }}"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- End Main Content -->

    <div class="mt-3">
        {{ $product->links() }}
    </div>

</div>
@endsection

<!-- Add Modal -->
<div class="modal fade" id="add" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content container">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus mr-2"></i>Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('dashboard/product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product" class="form-control" placeholder="Insert product name"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($category as $category_data)
                            <option value="{{ $category_data->id }}">{{ $category_data->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Insert product price"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
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
                <h4 class="modal-title"><i class="fas fa-edit mr-2"></i>Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('dashboard/product/update') }}" method="POST" id="edit-form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product" id="product-name" class="form-control"
                            placeholder="insert product name">
                    </div>
                    <div>
                        <input type="hidden" name="id" id="product-id">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($category as $category_data)
                            <option value="{{ $category_data->id }}">{{ $category_data->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" id="product-price" class="form-control"
                            placeholder="insert product price">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Product</button>
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
                <h4 class="modal-title"><i class="fas fa-trash mr-2"></i>Delete Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('dashboard/product/delete') }}" method="POST" id="delete">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product" id="product-name" class="form-control"
                            placeholder="insert product name" readonly>
                    </div>
                    <div>
                        <input type="hidden" name="id" id="product-id">
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
