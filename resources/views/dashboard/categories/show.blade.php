@extends('dashboard.layout')

@section('title')
    Show Page
@endsection


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="{{ route('admin.categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back to catigories
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Show category</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>Icon</th>
                        <td>
                            <i class="fas fa-{{ $category->icon }}"></i>
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>
                            <img src="{{ asset($category->photo) }}" style="width: 400px;" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
