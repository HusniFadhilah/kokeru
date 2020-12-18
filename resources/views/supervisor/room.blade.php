@extends('layouts.app')
@extends('layouts.navbar')

@section('title', 'Dashboard - Supervisor')

@section('content')
{{-- <div class="pcoded-content"> --}}
{{-- <div class="pcoded-inner-content"> --}}
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="text-center">
                <h3>Monitoring Kebersihan dan Kerapihan Ruang Gedung Bersama Maju</h3>
                <p>Hari {{ Date::hari(now()) }} Tanggal 12 November 2020 jam {{ Date::pukul(now()) }} WIB</p>
            </div>
            <div class="row">
                @forelse($reports_today as $report)
                <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.123</h1>
                                <p>SUDAH</p>
                                <h6><span class="ti-user mr-2"></span>Doni Kusuma</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12">
                    <div class="btn btn-block alert alert-dark" role="alert">
                        Belum ada data
                    </div>
                </div>
                @endforelse
                {{-- <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.124</h1>
                                <p>BELUM</p>
                                <h6><span class="ti-user mr-2"></span>Deni Maulana</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.32</h1>
                                <p>SUDAH</p>
                                <h6><span class="ti-user mr-2"></span>Deni Maulana</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.50</h1>
                                <p>SUDAH</p>
                                <h6><span class="ti-user mr-2"></span>Deni Maulana</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.24</h1>
                                <p>BELUM</p>
                                <h6><span class="ti-user mr-2"></span>Doni Kusuma</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.46</h1>
                                <p>SUDAH</p>
                                <h6><span class="ti-user mr-2"></span>Deni Maulana</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.100</h1>
                                <p>SUDAH</p>
                                <h6><span class="ti-user mr-2"></span>Deni Maulana</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">R.32</h1>
                                <p>BELUM</p>
                                <h6><span class="ti-user mr-2"></span>Dedi Kurniadi</h6>
                            </div>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
{{-- </div>
</div> --}}
@endsection
