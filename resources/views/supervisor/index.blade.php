@extends('layouts.default')

@section('title', 'Dashboard - Supervisor')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- order-card start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Jumlah Karyawan</h6>
                                    <h2 class="text-right"><i class="ti-user f-left"></i><span>100</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Jumlah Ruangan</h6>
                                    <h2 class="text-right"><i class="ti-location-pin f-left"></i><span>20</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Sudah Dibersihkan</h6>
                                    <h2 class="text-right"><i class="ti-check f-left"></i><span>15</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Belum Dibersihkan</h6>
                                    <h2 class="text-right"><i class="ti-close f-left"></i><span>5</span></h2>
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
                                            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Hari ini</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Semua</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="home3" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Ruangan</th>
                                                        <th>Tanggal</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>John</td>
                                                        <td>A101</td>
                                                        <td>05-01-2017</td>
                                                        <td><span class="label label-danger">Belum</span></td>
                                                        <td><a class="btn btn-sm btn-warning">Edit</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Cole</td>
                                                        <td>A104</td>
                                                        <td>05-01-2017</td>
                                                        <td><span class="label label-success">Sudah</span></td>
                                                        <td><a class="btn btn-sm btn-warning">Edit</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Dony</td>
                                                        <td>A103</td>
                                                        <td>05-01-2017</td>
                                                        <td><span class="label label-success">Sudah</span></td>
                                                        <td><a class="btn btn-sm btn-warning">Edit</a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
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
