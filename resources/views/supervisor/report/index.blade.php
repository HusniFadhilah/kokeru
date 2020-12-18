@extends('layouts.default')

@section('title', 'Data - Laporan')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <form action="{{ route('supervisor.report.export.excel') }}" method="get" class="d-inline mr-1">
                                <input type="date" class="d-none" name="date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                                @if($status != 2)
                                <input type="text" class="d-none" name="status" value="{{ $status }}">
                                @endif
                                <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-download mr-2"></i>Export Excel</button>
                            </form>
                            <form action="{{ route('supervisor.report.export.pdf') }}" method="get" class="d-inline">
                                <input type="date" class="d-none" name="date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                                @if($status != 2)
                                <input type="text" class="d-none" name="status" value="{{ $status }}">
                                @endif
                                <button type="submit" class="btn btn-success mb-3"><i class="fa fa-download mr-2"></i>Export PDF</button>
                            </form>
                            <form action="{{ route('supervisor.report.data') }}" method="get">
                                <div class="card tabs-card">
                                    <div class="card-header">
                                        <h5>Tanggal & Status Laporan</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="fa fa-chevron-left"></i></li>
                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                <li><a href="{{ route('supervisor.report.data') }}"><i class="fa fa-refresh reload-card"></i></a></li>
                                                <li><i class="fa fa-times close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Pilih Tanggal & Status</label>
                                            <div class="col-lg-3">
                                                <input type="date" class="form-control" name="date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                                            </div>
                                            <div class="col-lg-3">
                                                <select name="status" class="form-control">
                                                    <option value="" {{ !isset($status) || $status == '' ? 'selected' : '' }}>Semua</option>
                                                    <option value="1" {{ $status == "1" ? 'selected' : '' }}>Sudah</option>
                                                    <option value="0" {{ $status == "0" ? 'selected' : '' }}>Belum</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="card tabs-card">
                                <div class="card-header">
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa-chevron-left"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><a href="{{ route('supervisor.report.data') }}"><i class="fa fa-refresh reload-card"></i></a></li>
                                            <li><i class="fa fa-times close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <h3 style="text-align: center">Laporan Kebersihan dan Kerapihan Ruang<br> Gedung Bersama Maju</h3>
                                        <p style="text-align: center">Hari {{ Date::hari($date) }} {{ Date::tanggal($date) }} {{ Date::bulan($date) }} {{ Date::tahun($date) }} jam {{ Date::pukul($date) }} WIB</p><br><br>
                                        <table class="datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Ruangan</th>
                                                    <th>Karyawan</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reports as $report)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $report->room['name'] }}</td>
                                                    <td>{{ $report->user['name'] }}</td>
                                                    <td>@if($report->status == 0)
                                                        <span class="label label-danger">Belum</span>
                                                        @else
                                                        <span class="label label-success">Sudah</span>
                                                        @endif</td>
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
                        <!-- tabs card end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
