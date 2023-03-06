<ul class="nav nav-tabs mt-5">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ url('/profile') }}">
            Personal Info.
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('orders') ? 'active' : '' }}" href="{{ url('orders') }}">
            Orders
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('change-password') ? 'active' : '' }}" href="{{ url('change-password') }}">
            Change Password
        </a>
    </li>
</ul>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
