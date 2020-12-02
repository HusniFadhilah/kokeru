<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo.ico') }}" />

    <!-- Custom styles for this template-->
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">

    <!-- Data Tables -->
    <link href="https://hm.if.fsm.undip.ac.id/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="">

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

    <div class="flash-data" data-text="{{ session()->get('text')  }}" data-title="{{ session()->get('title')  }}" data-icon="{{ session()->get('icon') }}"></div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js') }}"></script>
    <!-- am chart -->
    <script src="{{ asset('assets/pages/widget/amchart/amcharts.min.js') }}"></script>
    <script src="{{ asset('assets/pages/widget/amchart/serial.min.js') }}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('assets/js/chart.js/Chart.js') }}"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="{{ asset('assets/pages/todo/todo.js') }} "></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript " src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/vartical-demo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- SweetAlert -->
    <script src="https://hm.if.fsm.undip.ac.id/assets/js/sweetalert2.all.min.js"></script>

    <!-- Data Tables -->
    <script src="https://hm.if.fsm.undip.ac.id/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="https://hm.if.fsm.undip.ac.id/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ajaxStart(function() {
            Pace.restart();
        });
        $(document).ready(function() {
            $('.datatable').DataTable({});
            $('.texteditor').ckeditor();
        });

    </script>
    <script type="text/javascript">
        const textflashData = $('.flash-data').data('text');
        const titleflashData = $('.flash-data').data('title');
        const iconflashData = $('.flash-data').data('icon');

        if (textflashData && titleflashData && iconflashData) {
            Swal.fire({
                title: titleflashData
                , text: textflashData
                , icon: iconflashData
            });
        }

        $('.tombol-hapus').on('click', function(e) {
            e.preventDefault();
            const textflashData = $(this).data('text');
            const href = $(this).attr('href');
            const form = document.getElementById('delete-form');
            Swal.fire({
                title: 'Apakah Anda yakin?'
                , text: 'Data ' + textflashData + ' ini akan dihapus'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.value) {
                    form.action = href;
                    form.submit();
                }
            });
        });

        function previewImg() {
            const gambar = document.querySelector('#image');
            const preview_gambar = document.querySelector('.img-preview');

            const file_gambar = new FileReader();
            file_gambar.readAsDataURL(gambar.files[0]);

            file_gambar.onload = function(e) {
                preview_gambar.src = e.target.result;
            }
        }

    </script>
</body>

</html>
