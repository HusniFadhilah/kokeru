@extends('layouts.default')

@section('title', 'Dashboard - Cleaning Service')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="text-center">
                        <h3>Monitoring Kebersihan dan Kerapihan Ruangan</h3>
                        <p>Hari {{ Date::hari(now()) }} {{ Date::tanggal(now()) }} {{ Date::Bulan(now()) }} {{ Date::tahun(now()) }} jam {{ Date::pukul(now()) }} WIB</p>
                    </div>
                    <div class="row">
                        @foreach($reports_today as $rep)
                        <div class="col-md-6 col-xl-3">
                            <a href="">
                                <div class="card bg-c-{{ $rep->status==0? 'pink':'green'}} order-card">
                                    <div class="card-block">
                                        <h1 class="m-b-20">{{ $rep->room['name'] }}</h1>
                                        <p>{{ $rep->status==0? "BELUM":"SUDAH"}}</p>
                                        <h6><span class="ti-user mr-2"></span>{{ $rep->user['name'] }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
