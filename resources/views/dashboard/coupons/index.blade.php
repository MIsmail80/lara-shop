@extends('dashboard.layout')

@section('title')
    Coupons
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Coupons</h1>

        <a href="{{ url('/admin/coupons/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            New Coupon
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Coupons List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Discount</th>
                            <th>Redeems</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if ($coupons->isNotEmpty())
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>
                                        {{ $coupon->code }}
                                    </td>
                                    <td>
                                        {{ $coupon->type == 1 ? 'Percent' : 'Fixed' }}
                                    </td>
                                    <td>
                                        {{ $coupon->discount }}
                                        {{ $coupon->type == 1 ? '%' : 'SAR' }}
                                    </td>
                                    <td>
                                        {{ $coupon->redeems }}
                                    </td>
                                    <td>
                                        {{ $coupon->active ? 'active' : 'expired' }}
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/coupons/' . $coupon->id) }}" method="POST">
                                            <a href="{{ url("admin/coupons/$coupon->id/edit") }}"
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

                {{ $coupons->links() }}
            </div>
        </div>
    </div>

@endsection
