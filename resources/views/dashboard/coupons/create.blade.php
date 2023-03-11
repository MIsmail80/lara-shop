@extends('dashboard.layout')

@section('title')
    Coupons
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Coupons</h1>

        <a href="{{ url('/admin/coupons') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back to Coupons
        </a>
    </div>

    <!-- DataTales Example -->
    <form action="{{ url('/admin/coupons') }}" method="POST">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    New Coupon
                </h6>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror">
                    @error('code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Type</label>
                    <select class="custom-select" name="type">
                        <option value="1">Percent</option>
                        <option value="2">Fixed</option>
                    </select>
                    @error('type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Discount</label>
                    <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror">
                    @error('discount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Redeems</label>
                    <input type="text" name="redeems" class="form-control @error('redeems') is-invalid @enderror">
                    @error('redeems')
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
