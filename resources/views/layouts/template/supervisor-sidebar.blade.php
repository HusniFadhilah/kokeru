<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            {{-- <a class="mobile-menu mb-2 pb-2" id="mobile-collapse" href="#!">
                <i class="ti-menu mb-2 pb-2"></i>
            </a> --}}

            <a href="">
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
                        <img src="https://ui-avatars.com/api/?name=Supervisor" class="img-radius" alt="User-Profile-Image">
                        <span>Supervisor</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('login') }}">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">

                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Home</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="active">
                        <a href="">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <span class="pcoded-micon"><i class="ti-location-pin"></i><b>R</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Ruangan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>CS</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Cleaning Service</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <span class="pcoded-micon"><i class="ti-settings"></i><b>S</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Settings</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('login') }}">
                            <span class="pcoded-micon"><i class="ti-share-alt"></i><b>S</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Logout</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
