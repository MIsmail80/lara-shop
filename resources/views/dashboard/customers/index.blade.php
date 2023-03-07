@extends('dashboard.layout')

@section('title')
    Customers
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Customers List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if ($customers->isNotEmpty())
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        {{ $customer->name }}
                                    </td>
                                    <td>
                                        {{ $customer->email }}
                                    </td>
                                    <td>
                                        {{ $customer->phone }}
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#exampleModal-{{ $customer->id }}">
                                            View
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-{{ $customer->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ $customer->name }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered mt-5 bg-white">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Payment Method</th>
                                                                    <th scope="col">Address</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @forelse ($customer->orders as $order)
                                                                    <tr>
                                                                        <th scope="row">
                                                                            {{ $order->status_text }}
                                                                        </th>
                                                                        <td>
                                                                            {{ $order->payment_method_text }}
                                                                        </td>
                                                                        <td>
                                                                            {{-- {{ empty($order->address) ? auth()->user()->address : $order->address }} --}}
                                                                            {{ $order->address ?: auth()->user()->address }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $order->total }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $order->created_at->toDayDateTimeString() }}
                                                                        </td>
                                                                        <td>
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                                data-target="#orderModal-{{ $order->id }}">
                                                                                Show
                                                                            </button>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="orderModal-{{ $order->id }}" tabindex="-1"
                                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-xl">
                                                                                    <div class="modal-content">

                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                                {{ $order->created_at->toDayDateTimeString() }}
                                                                                            </h5>
                                                                                            <button type="button" class="close" data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>

                                                                                        <div class="modal-body">
                                                                                            <table class="table">
                                                                                                <thead class="text-uppercase">
                                                                                                    <tr>
                                                                                                        <th>Product Name</th>
                                                                                                        <th>Price</th>
                                                                                                        <th>Quantity</th>
                                                                                                        <th>Total Price</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                    @foreach ($order->products as $product)
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <div class="cart_product">
                                                                                                                    <div class="item_image">
                                                                                                                        <img src="{{ asset($product->featured_photo) }}"
                                                                                                                            alt="image_not_found" class="w-25">
                                                                                                                    </div>
                                                                                                                    <div class="item_content">
                                                                                                                        <h4 class="item_title">
                                                                                                                            {{ $product->name }}
                                                                                                                        </h4>
                                                                                                                        <span class="item_type">
                                                                                                                            {{ $product->category->name }}
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <span class="price_text">
                                                                                                                    {{ $product->price }}
                                                                                                                </span>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {{ $product->pivot->quantity }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <span class="total_price">
                                                                                                                    {{ $total = $product->price * $product->pivot->quantity }}
                                                                                                                </span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach

                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            @if ($order->status == App\Models\Order::STATUS_NEW || $order->status == App\Models\Order::STATUS_IN_PROGREE)
                                                                                <button type="button" class="btn btn-danger">
                                                                                    Cancel
                                                                                </button>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="100%">
                                                                            <div class="alert alert-warning text-center">
                                                                                No Orders Available.
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforelse

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger" role="alert">
                                        No Data Found!
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

                {{ $customers->links() }}
            </div>
        </div>
    </div>

@endsection
