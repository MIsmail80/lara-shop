@extends('dashboard.layout')

@section('title')
    Create Page
@endsection


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="{{ route('admin.categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back to catigories
        </a>
    </div>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit category</h6>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{ $category->name }}" class="form-control" id="name" name="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    <input type="text" class="form-control" value="{{ $category->icon }}" id="icon" name="icon">
                    @error('icon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label>Photo</label>
                <div class="custom-file">
                    <label class="custom-file-label">Choose photo</label>
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    @error('icon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <img src=" {{ asset($category->photo) }} " style="width:100px">
                </div>
            </div>

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

    </form>
@endsection
