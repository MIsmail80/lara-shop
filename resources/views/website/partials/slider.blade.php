<section class="slider_section supermarket_slider sec_ptb_50 clearfix"
    data-background="assets/images/backgrounds/bg_13.jpg">
    <div class="container maxw_1460">
        <div class="row justify-content-lg-between">
            <div class="col-lg-3">
                <div class="alldepartments_menu_wrap">
                    <div class="alldepartments_dropdown show_lg collapse" id="alldepartments_dropdown">
                        <div class="card">
                            <ul class="alldepartments_menulist ul_li_block clearfix">

                                @foreach ($cats as $category)
                                    <li class="has_child">
                                        <a href="{{ url('/category/' . $category->id) }}">
                                            <span class="icon">
                                                <i class="fas fa-{{ $category->icon }}"></i>
                                            </span>
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="main_slider clearfix" data-slick='{"arrows": false}'>

                    @foreach ($slides as $slide)
                        <div class="item clearfix" data-bg-color="#ffc156">
                            <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".2s">
                                <img src="{{ asset($slide->photo) }}" alt="image_not_found">
                            </div>
                            <div class="slider_content">
                                {!! $slide->content !!}

                                @if ($slide->product_id)
                                    <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                        <a href="{{ url('product/' . $slide->product_id) }}"
                                            class="custom_btn btn_round bg_supermarket_red">
                                            Start Buying
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
