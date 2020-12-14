@include('layouts.header')
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        @if(Auth::user()->hasRole('Supervisor'))
        @include('layouts/template/supervisor-sidebar')
        @elseif(Auth::user()->hasRole('CS'))
        @include('layouts/template/cs-sidebar')
        @endif
        @yield('content')
    </div>
</div>

</div>
</div>
@include('layouts.footer')
