@extends('dashboard.layout')

@section('title')
    Flash Deals
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Flash Deals</h1>

        <a href="{{ url('/admin/deals/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            New Deal
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Flash Deals List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Discount</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if ($deals->isNotEmpty())
                            @foreach ($deals as $deal)
                                <tr>
                                    <td>
                                        {{ $deal->name }}
                                    </td>
                                    <td>
                                        {{ $deal->product->name }}
                                    </td>
                                    <td>
                                        {{ $deal->discount }} %
                                    </td>
                                    <td>
                                        {{ $deal->duration }} hrs
                                    </td>
                                    <td>
                                        {{ $deal->active ? 'active' : 'expired' }}
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/deals/' . $deal->id) }}" method="POST">
                                            <a href="{{ url("admin/deals/$deal->id/edit") }}"
                                                class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="100%">
                                    <div class="alert alert-danger" role="alert">
                                        No Data Found!
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

                {{ $deals->links() }}
            </div>
        </div>
    </div>

@endsection
