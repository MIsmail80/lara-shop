@extends('website.layout')

@section('content')
    <section class="cart_section sec_ptb_50 clearfix">
        <div class="container">
            <h2>Your Profile</h2>

            @include('website.user.tabs')

            <form action="{{ url('change-password') }}" method="POST" class="mt-5">
                @csrf

                <div class="reg_form">
                    <div class="form_item">
                        <input type="password" name="password" placeholder="Password">
                    </div>

                    <div class="form_item">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="custom_btn bg_default_red text-uppercase mb_50">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
