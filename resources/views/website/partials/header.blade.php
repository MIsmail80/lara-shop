<header class="header_section supermarket_header bg-white clearfix">
    <div class="header_middle clearfix">
        <div class="container maxw_1460">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-3">
                    <div class="brand_logo">
                        <a class="brand_link" href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/logo/logo_18_1x.png') }}" alt="logo_not_found">
                        </a>

                        <ul class="mh_action_btns ul_li clearfix">
                            <li>
                                <button type="button" class="search_btn" data-toggle="collapse"
                                    data-target="#search_body_collapse" aria-expanded="false"
                                    aria-controls="search_body_collapse">
                                    <i class="fal fa-search"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="cart_btn">
                                    <i class="fal fa-shopping-cart"></i>
                                    <span class="btn_badge">
                                        {{ $cartCount }}
                                    </span>
                                </button>
                            </li>
                            <li><button type="button" class="mobile_menu_btn"><i class="far fa-bars"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5">
                    <form action="{{ url('search-results') }}">
                        <div class="medical_search_bar">
                            <div class="form_item">
                                <input type="search" name="keyword" placeholder="search here..."
                                    value="{{ $_GET['keyword'] ?? '' }}">
                            </div>
                            <div class="option_select mb-0">
                                <select name="category_id">
                                    <option data-display="All Category" value="">
                                        Select A Option
                                    </option>

                                    @foreach ($cats as $category)
                                        <option value="{{ $category->id }}"
                                            {{ isset($_GET['category_id']) && $_GET['category_id'] == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <button type="submit" class="submit_btn"><i class="fal fa-search"></i></button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-3">
                    <div class="supermarket_header_btns clearfix">
                        <ul class="action_btns_group ul_li_right justify-content-center clearfix">

                            @if (Auth::check())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                        data-toggle="dropdown" aria-expanded="false">
                                        Welcome back, {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{ url('profile') }}" class="dropdown-item">
                                            Profile
                                        </a>
                                        <a href="{{ url('logout') }}" class="dropdown-item">
                                            Sign out
                                        </a>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('register') }}" class="btn btn-danger btn-sm">
                                        New Account
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('login') }}" class="btn btn-danger btn-sm">
                                        Sign in
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>

                <div class="col-lg-1">
                    <div class="supermarket_header_btns clearfix">
                        <ul class="action_btns_group ul_li_right clearfix">
                            <li>
                                <a href="{{ Auth::check() ? url('cart') : url('login') }}" class="cart_btn">
                                    <i class="fal fa-shopping-bag"></i>
                                    <span class="btn_badge">
                                        {{ $cartCount }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header_bottom clearfix">
        <div class="container maxw_1460">
            <nav class="main_menu clearfix">
                <ul class="ul_li clearfix">
                    <li>
                        <button class="alldepartments_btn bg_supermarket_red text-uppercase" type="button"
                            data-toggle="collapse" data-target="#alldepartments_dropdown" aria-expanded="false"
                            aria-controls="alldepartments_dropdown">
                            <i class="far fa-bars"></i> All Departments
                        </button>
                    </li>
                    <li class="menu_item_has_child">
                        <a href="#!">Home</a>
                        <div class="mega_menu text-center">
                            <div class="background" data-bg-color="#ffffff">
                                <div class="container">
                                    <ul class="home_pages ul_li clearfix">

                                        @foreach ($cats as $category)
                                            <li>
                                                <a href="{{ url('/category/' . $category->id) }}">
                                                    <span class="item_image">
                                                        <img src="{{ asset($category->photo) }}"
                                                            alt="{{ $category->name }}">
                                                    </span>
                                                    <span class="item_title">
                                                        {{ $category->name }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu_item_has_child">
                        <a href="#!">Pages</a>
                        <ul class="submenu">
                            <li class="menu_item_has_child">
                                <a href="#!">Shop Inner Pages</a>
                                <ul class="submenu">
                                    <li><a href="shop_cart.html">Shopping Cart</a></li>
                                    <li><a href="shop_checkout.html">Checkout Step 1</a></li>
                                    <li><a href="shop_checkout_step2.html">Checkout Step 2</a></li>
                                    <li><a href="shop_checkout_step3.html">Checkout Step 3</a></li>
                                </ul>
                            </li>
                            <li><a href="404.html">404 Page</a></li>
                            <li class="menu_item_has_child">
                                <a href="#!">Blogs</a>
                                <ul class="submenu">
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog_details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="menu_item_has_child">
                                <a href="#!">Compare</a>
                                <ul class="submenu">
                                    <li><a href="compare_1.html">Compare V.1</a></li>
                                    <li><a href="compare_2.html">Compare V.2</a></li>
                                </ul>
                            </li>
                            <li class="menu_item_has_child">
                                <a href="#!">Register</a>
                                <ul class="submenu">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="signup.html">Sign Up</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#!">About us</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div id="search_body_collapse" class="search_body_collapse collapse">
        <div class="search_body">
            <div class="container-fluid prl_90">
                <form action="#">
                    <div class="form_item mb-0">
                        <input type="search" name="search" placeholder="Type here...">
                        <button type="submit"><i class="fal fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
