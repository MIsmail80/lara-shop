@extends('dashboard.layout')

@section('title')
    Edit Page
@endsection


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="{{ route('admin.products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back to products
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit product</h6>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <div class="form-group">
                    <label>Categories</label>
                    <select class="custom-select" name="category_id">
                        <option selected value=" {{ $product->category->id}}"> {{ $product->category->name}} </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ old( 'name', $category)}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{old( 'name', $product) }}" class="form-control" id="name" name="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <label>Price</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="price" name="price" value="{{ old( 'price', $product)}}">
                    {{-- <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div> --}}
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock' , $product)}}">
                    @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="description" name="description" rows="10" > {{  old('description', $product)}} </textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <label>Photos</label>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="photos[]" multiple>
                    <label class="custom-file-label">Choose file...</label>
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

    </form>
@endsection
