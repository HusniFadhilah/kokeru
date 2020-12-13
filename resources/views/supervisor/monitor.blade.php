@extends('layouts.app')
@extends('layouts.navbar')

@section('title', 'Home - Monitoring')

@section('content')
{{-- <div class="pcoded-content"> --}}
{{-- <div class="pcoded-inner-content"> --}}
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="text-center">
                <h3>Monitoring Kebersihan dan Kerapihan Ruang Gedung A</h3>
                <p>Hari {{ Date::hari(now()) }} {{ Date::tanggal(now()) }} {{ Date::Bulan(now()) }} {{ Date::tahun(now()) }} jam {{ Date::pukul(now()) }} WIB</p>
            </div>
            <div class="row">
                @foreach($reports_today as $report)
                <div class="col-md-6 col-xl-3">
                    <a href="" class="trigger-modal" data-cs="{{ $report->user['name'] }}" data-room="{{ $report->room['name'] }}" data-file1="{{ asset('storage/'.$report->file_1) }}" data-file2="{{ asset('storage/'.$report->file_2) }}" data-file3="{{ asset('storage/'.$report->file_3) }}" data-file4="{{ asset('storage/'.$report->file_4) }}" data-file5="{{ asset('storage/'.$report->file_5) }}" data-video="{{ asset('storage/'.$report->video) }}" data-toggle="modal" data-target="#modal">
                        <div class="card bg-c-{{ $report->status==0? 'pink':'green'}} order-card">
                            <div class="card-block">
                                <h1 class="m-b-20">{{ $report->room['name'] }}</h1>
                                <p>{{ $report->status==0? "BELUM":"SUDAH"}}</p>
                                <h6><span class="ti-user mr-2"></span>{{ $report->user['name'] }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- </div>
</div> --}}
@endsection
