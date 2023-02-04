@extends('dashboard.layout')

@section('title')
    Admin Products
@endsection

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <a href="{{ route('admin.products.create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                New product
            </a>
        </div>

        <!-- All products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">products List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Categories</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($products->isNotEmpty())
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->name }}
                                        </td>

                                        <td>
                                            {{ $product->category->name }}
                                        </td>

                                        <td>
                                            <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('admin.products.show', $product->id) }}"
                                                    class="btn btn-sm btn-info ">
                                                    Show
                                                </a>
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
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
                    {{ $products->links() }}
                </div>
            </div>
        </div>




    @endsection
