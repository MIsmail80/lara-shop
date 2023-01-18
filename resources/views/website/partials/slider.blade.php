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
                                        <a href="#!">
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
                    <div class="item clearfix" data-bg-color="#ffc156">
                        <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".2s">
                            <img src="assets/images/slider/supermarket/img_01.png" alt="image_not_found">
                        </div>
                        <div class="slider_content">
                            <h4 data-animation="fadeInUp" data-delay=".4s">sell to get what you love</h4>
                            <h3 data-animation="fadeInUp" data-delay=".6s">The Gift you are Wishing</h3>
                            <div class="item_price" data-animation="fadeInUp" data-delay=".8s">
                                <small>From</small>
                                <sup>£</sup>749<sup>99</sup>
                            </div>
                            <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                <a href="#!" class="custom_btn btn_round bg_supermarket_red">Start Buying</a>
                            </div>
                        </div>
                    </div>

                    <div class="item clearfix" data-bg-color="#ffc156">
                        <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".2s">
                            <img src="assets/images/slider/supermarket/img_01.png" alt="image_not_found">
                        </div>
                        <div class="slider_content">
                            <h4 data-animation="fadeInUp" data-delay=".4s">sell to get what you love</h4>
                            <h3 data-animation="fadeInUp" data-delay=".6s">The Gift you are Wishing</h3>
                            <div class="item_price" data-animation="fadeInUp" data-delay=".8s">
                                <small>From</small>
                                <sup>£</sup>749<sup>99</sup>
                            </div>
                            <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                <a href="#!" class="custom_btn btn_round bg_supermarket_red">Start Buying</a>
                            </div>
                        </div>
                    </div>

                    <div class="item clearfix" data-bg-color="#ffc156">
                        <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".2s">
                            <img src="assets/images/slider/supermarket/img_01.png" alt="image_not_found">
                        </div>
                        <div class="slider_content">
                            <h4 data-animation="fadeInUp" data-delay=".4s">sell to get what you love</h4>
                            <h3 data-animation="fadeInUp" data-delay=".6s">The Gift you are Wishing</h3>
                            <div class="item_price" data-animation="fadeInUp" data-delay=".8s">
                                <small>From</small>
                                <sup>£</sup>749<sup>99</sup>
                            </div>
                            <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                <a href="#!" class="custom_btn btn_round bg_supermarket_red">Start Buying</a>
                            </div>
                        </div>
                    </div>

                    <div class="item clearfix" data-bg-color="#ffc156">
                        <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".2s">
                            <img src="assets/images/slider/supermarket/img_01.png" alt="image_not_found">
                        </div>
                        <div class="slider_content">
                            <h4 data-animation="fadeInUp" data-delay=".4s">sell to get what you love</h4>
                            <h3 data-animation="fadeInUp" data-delay=".6s">The Gift you are Wishing</h3>
                            <div class="item_price" data-animation="fadeInUp" data-delay=".8s">
                                <small>From</small>
                                <sup>£</sup>749<sup>99</sup>
                            </div>
                            <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                <a href="#!" class="custom_btn btn_round bg_supermarket_red">Start Buying</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
