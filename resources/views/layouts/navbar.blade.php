<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route(Fungsi::get_role_session().'.index') }}">
                            {{ __('Dashboard') }}
                        </a> 
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{-- <nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">

            <a href="{{ route('home') }}">
<h3 class="ml-4 mt-2">KoKeRu</h3>
</a>
<a class="mobile-options">
    <i class="ti-more"></i>
</a>
</div>

<div class="navbar-container container-fluid">

    <ul class="nav-right">
        <li class="user-profile header-notification">
            <a href="#!">
                <span>{{ Auth::user()->name }}</span>
                <i class="ti-angle-down"></i>
            </a>
            <ul class="show-notification profile-notification">
                <li>
                    <a href="">
                        <i class="ti-settings"></i> Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="ti-user"></i> Profile
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}">
                        <i class="ti-layout-sidebar-left"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
</div>
</nav> --}}
