@extends('layouts.default')

@section('title', 'Dashboard - Supervisor')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h4>Monitoring Kebersihan dan Kerapihan Ruang Gedung Bersama Maju</h4>
                                <p>Hari {{ Date::hari(now()) }} {{ Date::tanggal(now()) }} {{ Date::Bulan(now()) }} {{ Date::tahun(now()) }} jam {{ Date::pukul(now()) }} WIB</p>
                            </div>
                        </div>
                        <!-- order-card start -->

                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('supervisor.cs.data') }}">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Jumlah Karyawan</h6>
                                        <h2 class="text-right"><i class="ti-user f-left"></i><span>{{ $sum_cs }}</span></h2>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('supervisor.room.data') }}">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Jumlah Ruangan</h6>
                                        <h2 class="text-right"><i class="ti-location-pin f-left"></i><span>{{ $sum_room }}</span></h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Sudah Dibersihkan</h6>
                                    <h2 class="text-right"><i class="ti-check f-left"></i><span>{{ $sum_status_sudah }}</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Belum Dibersihkan</h6>
                                    <h2 class="text-right"><i class="ti-close f-left"></i><span>{{ $sum_status_belum }}</span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- order-card end -->

                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <div class="card tabs-card">
                                <div class="card-block p-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#today" role="tab"><i class="fa fa-calendar"></i>Hari ini</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#all" role="tab"><i class="fa fa-globe"></i>Semua</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block table-border-style">
                                        <div class="tab-pane active" id="today" role="tabpanel">

                                            <div class="table-responsive table-hover">
                                                <table class="datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Ruangan</th>
                                                            <th>Tanggal</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($reports_today as $report)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $report->user->name }}</td>
                                                            <td>{{ $report->room['name'] }}</td>
                                                            <td>{{ Date::indo_date($report->date_time) }}</td>
                                                            <td>
                                                                @if($report->status == 0)
                                                                <span class="label label-danger">Belum</span>
                                                                @else
                                                                <span class="label label-success">Sudah</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary trigger-modal" data-cs="{{ $report->user['name'] }}" data-room="{{ $report->room['name'] }}" data-file1="{{ asset('storage/'.$report->file_1) }}" data-file2="{{ asset('storage/'.$report->file_2) }}" data-file3="{{ asset('storage/'.$report->file_3) }}" data-file4="{{ asset('storage/'.$report->file_4) }}" data-file5="{{ asset('storage/'.$report->file_5) }}" data-video="{{ asset('storage/'.$report->video) }}" data-toggle="modal" data-target="#modal">
                                                                    <i class="fa fa-eye mr-2"></i>Lihat Bukti
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="all" role="tabpanel">

                                            <div class="table-responsive table-hover">
                                                <table class="datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Ruangan</th>
                                                            <th>Tanggal</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($reports as $report)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $report->user->name }}</td>
                                                            <td>{{ $report->room['name'] }}</td>
                                                            <td>{{ Date::indo_date($report->date_time) }}</td>
                                                            <td>
                                                                @if($report->status == 0)
                                                                <span class="label label-danger">Belum</span>
                                                                @else
                                                                <span class="label label-success">Sudah</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary trigger-modal" data-cs="{{ $report->user['name'] }}" data-room="{{ $report->room['name'] }}" data-file1="{{ asset('storage/'.$report->file_1) }}" data-file2="{{ asset('storage/'.$report->file_2) }}" data-file3="{{ asset('storage/'.$report->file_3) }}" data-file4="{{ asset('storage/'.$report->file_4) }}" data-file5="{{ asset('storage/'.$report->file_5) }}" data-video="{{ asset('storage/'.$report->video) }}" data-toggle="modal" data-target="#modal">
                                                                    <i class="fa fa-eye mr-2"></i>Lihat Bukti
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tabs card end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
