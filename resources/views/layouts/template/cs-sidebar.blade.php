@include('layouts.template.navbar')
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">

                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Home</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->is('cs') ? 'active' : ''}}">
                        <a href="{{ route('cs.index') }}">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('logout') }}">
                            <span class="pcoded-micon"><i class="ti-share-alt"></i><b>L</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Logout</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
