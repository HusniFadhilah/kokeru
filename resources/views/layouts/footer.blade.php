<!-- Modal -->
<div class="modal fade" id="modal" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Bukti Kebersihan & Kerapihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row ada-bukti">
                    <div class="col-6">
                        <span>
                            <h6>Pengirim: </h6><span id="cs"></span>
                        </span>
                    </div>
                    <div class="col-6">
                        <span>
                            <h6>Ruangan: </h6><span id="room"></span>
                        </span>
                    </div>
                </div>
                <h6 class="mt-4">Bukti Foto</h6>
                <div class="row">
                    <div class="col-12 bukti-kosong">
                        <div class="btn btn-block alert alert-dark" role="alert">
                            Belum ada bukti
                        </div>
                    </div>
                    @for($i=1;$i<=5;$i++) <div class="col-lg-4">
                        <div class="item web">
                            <a href="" class="item-wrap image-popup" id="link{{ $i }}">
                                <span class="fa fa-search"></span>
                                <img src="" class="img-thumbnail" style="height: 190px;width:100%; object-fit:cover;" id="file{{ $i }}">
                            </a>
                        </div>
                </div>
                @endfor
            </div>
            <h6 class="mt-4 bukti-video">Bukti Video</h6>
            <div class="row bukti-video">
                <div class="col-12">
                    <div class="item web">
                        <a href="" class="item-wrap popup-vimeo" id="videolink">
                            <span class="fa fa-search"></span>
                            <video style="width:100%" *ngIf="src" controls>
                                <source [src]="" id="video" [type]="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
</div>

@php $tanggalreset = Fungsi::get_schedule_now()@endphp

@if($tanggalreset != '0000-00-00' && $tanggalreset != null)
<form action="{{ route('schedule.reset') }}" method="post" id="reset-form">
    @csrf
    @method('patch')
    <input type="hidden" name="finish" value="{{ $tanggalreset }} 23:59:00">
</form>
@endif
<div class="flash-data" data-text="{{ session()->get('text')  }}" data-title="{{ session()->get('title')  }}" data-icon="{{ session()->get('icon') }}"></div>

<script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
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
{{-- <script type="text/javascript " src="{{ asset('assets/js/SmoothScroll.js') }}"></script> --}}
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/vartical-demo.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- SweetAlert -->
<script src="https://hm.if.fsm.undip.ac.id/assets/js/sweetalert2.all.min.js"></script>

@if(Fungsi::get_schedule_now() != '0000-00-00' && Fungsi::get_schedule_now() != null)
<script>
    $(".main-menu").mCustomScrollbar({
        setTop: "1px"
        , setHeight: "calc(100% - 120px)"
    , });

</script>
@else
<script>
    $(".main-menu").mCustomScrollbar({
        setTop: "1px"
        , setHeight: "calc(100%)"
    , });

</script>
@endif
<script>
    const formreset = document.getElementById('reset-form');
    const finish = document.querySelector('input[name=finish]').value;
    var countDownDate = new Date(finish);

    countDownDate = new Date(countDownDate);

    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("hitung").innerHTML = days + "<span style='font-size:14px'> h</span> : " + hours + "<span style='font-size:14px'> j</span> : " + minutes + "<span style='font-size:14px'> m</span> : " + seconds + "<span style='font-size:14px'> d</span>";

        if (distance < 0) {
            clearInterval(x);
            formreset.submit();
        }
    }, 1000);


    $(".image-popup").magnificPopup({
        type: "image"
        , closeOnContentClick: !0
        , closeBtnInside: !1
        , fixedContentPos: !0
        , mainClass: "mfp-no-margins mfp-with-zoom"
        , gallery: {
            enabled: !0
            , navigateByImgClick: !0
            , preload: [0, 1]
        }
        , image: {
            titleSrc: "title"
            , verticalFit: !0
        }
        , zoom: {
            enabled: !0
            , duration: 300
        }

    });



    $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
        disableOn: 300
        , type: "iframe"
        , mainClass: "mfp-fade"
        , removalDelay: 160
        , preloader: !1
        , fixedContentPos: !1
    })

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.datatable').DataTable({});
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
            , confirmButtonColor: '#28a745'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.value) {
                form.action = href;
                form.submit();
            }
        });
    });

    $('.tombol-konfirmasi').on('click', function(e) {
        e.preventDefault();
        const messageflashData = $(this).data('message');
        const href = $(this).attr('href');
        const form = document.getElementById('confirm-form');
        Swal.fire({
            title: 'Apakah Anda yakin?'
            , text: messageflashData
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Ya, lanjutkan!'
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

    function previewImages() {

        var preview = document.querySelector('#preview');


        if (this.files.length <= 5) {
            [].forEach.call(this.files, readAndPreview);
        } else {
            alert('Maksimum 5 file yang dapat diupload!');
        }

        function readAndPreview(file) {

            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } else {
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.style.maxHeight = "100px";
                    image.style.objectFit = "cover";
                    image.title = file.name;
                    image.src = this.result;
                    image.className = "col-lg-2 col-md-4 col-4 img-thumbnail";
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);
            }

        }

    }

    document.querySelector('#file-input').addEventListener("change", previewImages);
    $(document).on("change", "#video", function(evt) {
        var $source = $('#video_here');
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
    });

</script>
<script>
    $(".bukti-kosong").hide();
    $(document).ready(function() {
        $('.trigger-modal').click(function() {
            let cs = $(this).data('cs');
            let room = $(this).data('room');
            let file1 = $(this).data('file1');
            let file2 = $(this).data('file2');
            let file3 = $(this).data('file3');
            let file4 = $(this).data('file4');
            let file5 = $(this).data('file5');
            let video = $(this).data('video');
            let $source = $('.modal-body #video');

            $(".modal-body #cs").text(cs);
            $(".modal-body #room").text(room);
            if (video.includes('video')) {
                $(".modal-body #videolink").attr('href', video);
                $(".modal-body #video").attr('src', video);
                $(".modal-body #video, .modal-body .bukti-video, .modal-body .bukti-video video").show();
                $(".modal-body #video").show();
            } else {
                $(".modal-body #video").attr('src', '');
                $(".modal-body #video").hide();
                $(".modal-body #video, .modal-body .bukti-video, .modal-body .bukti-video video").hide();
            }
            if (file1.includes('img')) {
                $(".modal-body #file1").attr('src', file1);
                $(".modal-body #link1").attr('href', file1);
                $(".modal-body #file1").show();
            } else {
                $(".modal-body #file1").attr('src', '');
                $(".modal-body #file1").hide();
            }
            if (file2.includes('img')) {
                $(".modal-body #link2").attr('href', file2);
                $(".modal-body #file2").attr('src', file2);
                $(".modal-body #file2").show();
            } else {
                $(".modal-body #file2").attr('src', '');
                $(".modal-body #file2").hide();
            }
            if (file3.includes('img')) {
                $(".modal-body #link3").attr('href', file3);
                $(".modal-body #file3").attr('src', file3);
                $(".modal-body #file3").show();
            } else {
                $(".modal-body #file3").attr('src', '');
                $(".modal-body #file3").hide();
            }
            if (file4.includes('img')) {
                $(".modal-body #link4").attr('href', file4);
                $(".modal-body #file4").attr('src', file4);
                $(".modal-body #file4").show();
            } else {
                $(".modal-body #file4").attr('src', '');
                $(".modal-body #file4").hide();
            }
            if (file5.includes('img')) {
                $(".modal-body #link5").attr('href', file5);
                $(".modal-body #file5").attr('src', file5);
                $(".modal-body #file5").show();
            } else {
                $(".modal-body #file5").attr('src', '');
                $(".modal-body #file5").hide();
            }

            if ($(".modal-body #file1").attr('src') == '') {
                $(".ada-bukti").hide();
                $(".bukti-kosong").show();
            } else {
                $(".ada-bukti").show();
                $(".bukti-kosong").hide();
            }

        })
    });

</script>

</body>

</html>
