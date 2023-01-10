@extends('dashboard.layout')

@section('title')
    Admin Categories
@endsection

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            <a href="{{ route('admin.categories.create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                New category
            </a>
        </div>

        <!-- All categories -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Icon</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            <img src=" {{ asset($category->photo) }} " style="width:150px">
                                        </td>
                                        <td>
                                            <i class="fas fa-{{ $category->icon }}"> </i>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-warning ">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger "> Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-danger" role="alert">
                                            Not data found
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>




    @endsection
