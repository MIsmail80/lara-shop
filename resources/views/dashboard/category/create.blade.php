@extends('dashboard.layout')

@section('title')
Categories
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>

    <a href="{{ url('/admin/categories') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        Back to cateogries
    </a>
</div>

<!-- DataTales Example -->
<form action="{{ url('/admin/categories') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                New Category
            </h6>
        </div>
        <div class="card-body">

            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Icon</label>
                <input type="text" name="icon" class="form-control">
                @error('icon')
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