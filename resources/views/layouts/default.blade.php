<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        @include('includes.navbar')

        <div class="container">
            @yield('content')

            <div class="row">
                @include('includes.footer')
            </div>
        </div>
    </body>
</html>
