@extends('website.layout')

@section('content')
    <section class="cart_section sec_ptb_50 clearfix">
        <div class="container">
            <h2>Your Cart</h2>

            <form action="{{ url('/update-cart') }}" method="POST">
                @csrf
                <div class="cart_table mb_50">
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

                            @php($subtotal = 0)

                            @forelse ($products as $product)
                                <tr>
                                    <td>
                                        <div class="cart_product">
                                            <div class="item_image">
                                                <img src="{{ asset($product->featured_photo) }}" alt="image_not_found">
                                            </div>
                                            <div class="item_content">
                                                <h4 class="item_title">
                                                    {{ $product->name }}
                                                </h4>
                                                <span class="item_type">
                                                    {{ $product->category->name }}
                                                </span>
                                            </div>
                                            <button type="button" class="remove_btn" data-pid="{{ $product->id }}">
                                                <i class="fal fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="price_text">
                                            {{ $product->price }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="quantity_input">
                                            <span class="input_number_decrement">–</span>
                                            <input class="input_number" type="text" name="quantity[{{ $product->id }}]"
                                                value="{{ $product->pivot->quantity }}">
                                            <span class="input_number_increment">+</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="total_price">
                                            {{ $total = $product->price * $product->pivot->quantity }}
                                        </span>
                                    </td>
                                </tr>
                                @php($subtotal += $total)

                                @if (isset($_GET['discount']))
                                    @php($subtotal -= $_GET['discount'])
                                @endif
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        <div class="alert alert-info">
                                            Your cart is empty!
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="coupon_wrap mb_50">
                    <div class="row justify-content-lg-between">
                        <div class="col">
                            <div class="cart_update_btn">
                                <button type="submit" class="custom_btn bg_secondary text-uppercase">
                                    Update Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-4">
                    <div class="coupon_form">
                        @if (session('coupon_error'))
                            <div class="alert alert-danger">
                                {{ session('coupon_error') }}
                            </div>
                        @endif
                        <form action="{{ url('/apply-coupon') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $subtotal }}" name="total" />
                            <div class="form_item mb-0">
                                <input type="text" class="coupon" value="{{ $_GET['code'] ?? '' }}" name="code"
                                    placeholder="Coupon Code">
                            </div>
                            <button type="submit" class="custom_btn bg_danger text-uppercase">
                                Apply Coupon
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-lg-end">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
                        <h3 class="table_title text-center" data-bg-color="#ededed">Cart Total</h3>
                        <ul class="ul_li_block clearfix">
                            <li>
                                <span>Subtotal</span>
                                <span id="subtotal">{{ $subtotal }}</span>
                            </li>
                            <li>
                                <span>VAT</span>
                                <span id="vat">{{ $vat = ($subtotal * 15) / 100 }}</span>
                            </li>
                            <li>
                                <span>Total</span>
                                <span id="total">{{ $subtotal + $vat }}</span>
                            </li>
                        </ul>
                        <a href="{{ url('/checkout') }}" class="custom_btn bg_success">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
