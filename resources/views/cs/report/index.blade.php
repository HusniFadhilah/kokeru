@extends('layouts.default')

@section('title', 'Selesaikan Tugas - CS')

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

                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <div class="card tabs-card">
                                <div class="card-block">

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
                                                    <td>{{ $report->room->name }}</td>
                                                    <td>{{ Date::indo_date($report->date_time) }}</td>
                                                    <td>
                                                        @if($report->status == 0)
                                                        <span class="label label-danger">Belum</span>
                                                        @else
                                                        <span class="label label-success">Sudah</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($report->status == 0)
                                                        <a href="{{ route('cs.report.edit',$report->id) }}" class="btn btn-sm btn-info"><i class="fa fa-upload mr-2"></i>Upload Bukti</a>
                                                        @else
                                                        <button class="btn btn-sm btn-primary trigger-modal" data-cs="{{ $report->user['name'] }}" data-room="{{ $report->room['name'] }}" data-file1="{{ asset('storage/'.$report->file_1) }}" data-file2="{{ asset('storage/'.$report->file_2) }}" data-file3="{{ asset('storage/'.$report->file_3) }}" data-file4="{{ asset('storage/'.$report->file_4) }}" data-file5="{{ asset('storage/'.$report->file_5) }}" data-video="{{ asset('storage/'.$report->video) }}" data-toggle="modal" data-target="#modal">
                                                            <i class="fa fa-eye mr-2"></i>Lihat Bukti
                                                        </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
