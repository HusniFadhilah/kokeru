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
                                                        <button class="btn btn-sm btn-primary trigger-modal" data-file1="{{ asset('storage/'.$report->file_1) }}" data-file2="{{ asset('storage/'.$report->file_2) }}" data-file3="{{ asset('storage/'.$report->file_3) }}" data-file4="{{ asset('storage/'.$report->file_4) }}" data-file5="{{ asset('storage/'.$report->file_5) }}" data-video="{{ asset('storage/'.$report->video) }}" data-toggle="modal" data-target="#modal">
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


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Bukti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Bukti Foto</h6>
                <div class="row">
                    @for($i=1;$i<=5;$i++) <div class="col-lg-4">
                        <img src="" class="img-thumbnail" style="height: 190px;width:100%; object-fit:cover;" id="file{{ $i }}">
                </div>
                @endfor
            </div>
            <h6 class="mt-4 bukti-video">Bukti Video</h6>
            <div class="row bukti-video">
                <div class="col-12">
                    <video style="width:100%" *ngIf="src" controls>
                        <source [src]="" id="video" [type]="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
</div>
@endsection
