<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            {{-- <a class="mobile-menu mb-2 pb-2" id="mobile-collapse" href="#!">
                <i class="ti-menu mb-2 pb-2"></i>
            </a> --}}

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
                        <img src="{{ asset(Auth::user()->avatar) }}" class="img-radius" alt="User-Profile-Image">
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
                            <a href="{{ route('profile.edit') }}">
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
</nav>
