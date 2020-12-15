@include('layouts.template.navbar')
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">

                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Home</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->is('supervisor/index') || request()->is('supervisor') ? 'active' : ''}}">
                        <a href="{{ route('supervisor.index') }}">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ request()->is('supervisor/room', 'supervisor/room/create', 'supervisor/room/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('supervisor.room.data') }}">
                            <span class="pcoded-micon"><i class="ti-location-pin"></i><b>R</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Ruangan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ Request::is('supervisor/cs', 'supervisor/cs/create', 'supervisor/cs/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('supervisor.cs.data') }}">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>CS</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Cleaning Service</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ Request::is('supervisor/schedule', 'supervisor/schedule/create', 'supervisor/schedule/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('supervisor.schedule.data') }}">
                            <span class="pcoded-micon"><i class="ti-calendar"></i><b>J</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Distribusi Jadwal</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{  request()->is('supervisor/report') ? 'active' : ''}}">
                        <a href="{{route('supervisor.report.data')}}">
                            <span class="pcoded-micon"><i class="ti-clipboard"></i><b>L</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Laporan</span>
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
                    @if(Fungsi::get_schedule_now() != '0000-00-00' && Fungsi::get_schedule_now() != null)
                    <li class="text-center d-none d-lg-block d-xl-block" style="bottom:10px;left:10px;position:fixed">
                        <div>Jadwal otomatis direset pada:</div>
                        <span class="font-weight-bold" style="font-size:17px" id="hitung"></span>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
