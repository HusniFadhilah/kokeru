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
                            <a href="" class="btn btn-primary mb-3"><i class="fa fa-download mr-2"></i>Export Excel</a>
     						<form>
                            <div class="card tabs-card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                    	<h3 style="text-align: center">Laporan Kebersihan dan Kerapihan Ruang Gedung A</h3>
                						<p style="text-align: center">Hari {{ Date::hari(now()) }} {{ Date::tanggal(now()) }} {{ Date::Bulan(now()) }} {{ Date::tahun(now()) }} jam {{ Date::pukul(now()) }} WIB</p><br><br>
                                        <table class="datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Ruangan</th>
                                                    <th>Karyawan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reports_today as $rp)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $rp->room['name'] }}</td>
                                                    <td>{{ $rp->user['name'] }}</td>
                                                    <td>{{ $rp->status==0? "BELUM":"SUDAH"}}</td>
                                                        </form>
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
