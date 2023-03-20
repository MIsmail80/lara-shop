@extends('website.layout')

@section('content')
    <!-- product_section - start ================================================== -->
    <section class="product_section sec_ptb_50 clearfix">
        <div class="container">
            <div class="carparts_filetr_bar clearfix">
                <h2>Search Results for {{ $_GET['keyword'] }}</h2>
            </div>

            <div class="row justify-content-center">

                @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="sports_product_item">
                            <div class="item_image" data-bg-color="#f5f5f5">

                                <img src="{{ $product->featured_photo }}" />

                                <ul class="product_action_btns ul_li_center clearfix">
                                    <li>
                                        <a href="{{ url('/product/' . $product->id) }}" style="width: 150px;">
                                            <i class="fal fa-eye"></i>
                                            Details
                                        </a>
                                    </li>
                                    {{-- <li><a href="#!"><i class="fas fa-shopping-cart"></i></a></li> --}}
                                </ul>
                                {{-- <ul class="product_label ul_li text-uppercase clearfix">
                                    <li class="bg_sports_red">50% Off</li>
                                    <li class="bg_sports_red">Sale</li>
                                </ul> --}}
                            </div>
                            <div class="item_content text-uppercase text-white">
                                <h3 class="item_title bg_black text-white mb-0">
                                    {{ $product->name }}
                                </h3>
                                <span class="item_price bg_sports_red">
                                    <strong>{{ $product->price }}</strong>
                                    {{-- <del>$390</del> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="alert alert-info mt-5 text-center">
                            No results found!
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- product_section - end ================================================== -->
@endsection
