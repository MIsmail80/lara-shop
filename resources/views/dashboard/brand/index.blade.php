@extends('dashboard.layout')

@section('title')
    Admin Brands
@endsection

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brands</h1>
            <a href="{{ route('admin.brands.create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                New Brand
            </a>
        </div>

        <!-- All Brands -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Brands List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($brands->isNotEmpty())
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>
                                            {{ $brand->name }}
                                        </td>
                                        <td>
                                            <img src=" {{ asset($brand->photo) }} " style="width:150px">
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.brands.destroy',$brand->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('admin.brands.show', $brand->id) }}"
                                                    class="btn btn-sm btn-info ">
                                                    Show
                                                </a>
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                                    class="btn btn-warning ">
                                                    Edit
                                                </a>
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
                    {{ $brands->links() }}
                </div>
            </div>
        </div>




    @endsection
