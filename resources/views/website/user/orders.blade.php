@extends('website.layout')

@section('content')
    <section class="cart_section sec_ptb_50 clearfix">
        <div class="container">
            <h2>Your Profile</h2>

            @include('website.user.tabs')

        </div>
    </section>
@endsection
