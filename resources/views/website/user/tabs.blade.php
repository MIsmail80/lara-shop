<ul class="nav nav-tabs mt-5">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('profile') ? 'active' : ''}}" href="{{ url('/profile') }}">
            Personal Info.
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('orders') ? 'active' : ''}}" href="{{ url('orders') }}">
            Orders
        </a>
    </li>
</ul>