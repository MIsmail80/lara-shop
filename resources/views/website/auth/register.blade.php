@extends('website.layout')

@section('content')
    <section class="register_section sec_ptb_140 parallaxie clearfix" data-background="assets/images/backgrounds/bg_23.jpg">
        <div class="container">
            <div class="reg_form_wrap signup_form" data-background="assets/images/reg_bg_02.png">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('register') }}" method="POST">
                    @csrf

                    <div class="reg_form">
                        <h2 class="form_title text-uppercase">Register</h2>

                        <div class="form_item">
                            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}">
                        </div>

                        <div class="form_item">
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>

                        <div class="form_item">
                            <input type="tel" name="phone" placeholder="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="form_item">
                            <input type="password" name="password" placeholder="Password">
                        </div>

                        <div class="form_item">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <button type="submit" class="custom_btn bg_default_red text-uppercase mb_50">
                            Create Account
                        </button>

                        <div class="create_account text-center">
                            <h4 class="small_title_text text-center text-uppercase">Do you have Account?</h4>
                            <a class="create_account_btn text-uppercase" href="{{ url('login') }}">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
