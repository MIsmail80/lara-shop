@extends('dashboard.layout')

@section('title')
    Products
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>

        <a href="{{ url('/admin/products') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back to Products
        </a>
    </div>

    <!-- DataTales Example -->
    <form action="{{ url('/admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit Product
                </h6>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>Categories</label>
                    <select class="custom-select" name="category_id">
                        <option selected value="">Select Category</option>
                        @foreach ($cats as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $product->name }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" value="0">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" name="stock" value="{{ $product->stock }}" class="form-control" value="0">
                    @error('stock')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="10">{{ $product->description }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Photos</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="photos[]" multiple>
                        <label class="custom-file-label">Choose file...</label>
                    </div>
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    @if ($product->photos->isNotEmpty())
                        <div class="card">
                            <div class="card-body row">
                                @foreach ($product->photos as $photo)
                                    <div class="img-box col">
                                        <img src="{{ asset($photo->path) }}" class="img-thumbnail" />
                                        <a href="{{ url('admin/products/del-image/' . $photo->id) }}" class="del-img">
                                            <img src="{{ asset('dashboard/img/remove.png') }}" class="w-25" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
