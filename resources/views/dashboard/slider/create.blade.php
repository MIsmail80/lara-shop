@extends('dashboard.layout')

@section('title')
    Slider
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Slider</h1>

        <a href="{{ url('/admin/slides') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back to Slider
        </a>
    </div>

    <!-- DataTales Example -->
    <form action="{{ url('/admin/slides') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    New Slide
                </h6>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>Products</label>
                    <select class="custom-select" name="product_id">
                        <option selected value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control editor" rows="10"></textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="photo">
                        <label class="custom-file-label">Choose file...</label>
                    </div>
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
